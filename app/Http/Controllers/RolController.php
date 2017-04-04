<?php

namespace App\Http\Controllers;

use App\DataTables\RolsDataTables;
use App\Rol;
//use Illuminate\Http\Request;
use App\Http\Requests\RolFormRequest as Request;
use Laracasts\Flash\Flash;

class RolController extends Controller
{
    /**
     * RolController constructor.
     */
    public function __construct()
    {
        $this->middleware("auth");
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(RolsDataTables $dataTable){

        return $dataTable->render('admin.rols.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("admin.rols.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request){

        Rol::create($request->all());

        Flash::success('Rol creado!')->important();

        return redirect("admin/rols");

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Rol  $rol
     * @return \Illuminate\Http\Response
     */
    public function show(Rol $rol)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Rol  $rol
     * @return \Illuminate\Http\Response
     */
    public function edit(Rol $rol)
    {
        return view("admin.rols.edit",compact('rol'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Rol  $rol
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Rol $rol)
    {
        $rol->fill($request->all())->save();
        Flash::success('Rol actualizado!')->important();
        return redirect("admin/rols");

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Rol  $rol
     * @return \Illuminate\Http\Response
     */
    public function destroy(Rol $rol)
    {
        $rol->delete();

        Flash::success('Rol eliminado!')->important();

        return redirect("admin/rols");
    }
}
