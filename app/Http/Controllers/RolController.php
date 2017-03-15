<?php

namespace App\Http\Controllers;

use App\DataTables\RolsDataTables;
use App\Rol;
//use Illuminate\Http\Request;
use App\Http\Requests\RolFormRequest as Request;

class RolController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(RolsDataTables $dataTable){
        $rols = Rol::all();
//        return view("admin.rols.index",compact('rols'));
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

        return redirect("admin/rols")->with('status','Rol creado!');

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

        return redirect("admin/rols")->with('status','Rol actualizado!');

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
        return redirect("admin/rols")->with('status','Rol eliminado!');
    }
}
