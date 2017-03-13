<?php

namespace App\Http\Controllers;

use Facades\App\Menu;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Requests\OptionMenuFormRequest;
use App\Option;

class OptionMenuController extends Controller{


    private $iconos=[
        'fa fa-circle-o',
        'fa-th',
        'fa-shopping-cart',
        'fa-folder',
        'fa-plus-square',
        'fa-info-circle',
        'fa-laptop',
        'fa-adjust',
        'fa-adn',
        'fa-align-center',
        'fa-align-justify',
        'fa-align-left',
        'fa-align-right',
        'fa-angle-left',
        'fa-angle-right',
        'fa-ambulance'
    ];

    /**
     * OptionMenuController constructor.
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
    public function index(){
        $ops= Option::all();
        $iconos= $this->iconos;

        $menu = Menu::renderAdmin($ops);
        return view("admin.menu.index",compact('ops','iconos','menu'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($idPadre){

        $ops=Option::all();
        $iconos=$this->iconos;
        if($idPadre!=0){
            $padre= Option::findOrFail($idPadre);
        }else{
            $padre=null;
        }

        return view("admin.menu.create",compact('ops','iconos','padre'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(OptionMenuFormRequest $request){

//        dd($request->all());
        Option::create([
            "padre" => $request->padre,
            "nombre" => $request->nombre,
            "descripcion" => $request->descripcion,
            "ruta" => $request->ruta,
            "icono_r" => $request->icono_r,
            "icono_l" => $request->icono_l
        ]);

        return redirect('admin/option')->with('status', 'Opción creada!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $opcion= Option::findOrFail($id);

        if ($opcion->padre){
            $padre= Option::findOrFail($opcion->padre);
        }
        $iconos=$this->iconos;

        return view('admin.menu.edit',compact('opcion','padre','iconos'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(OptionMenuFormRequest $request, $id)
    {

        $op= Option::findOrFail($id);


        $op->padre= $request->padre=="" ? null : $request->padre;
        $op->nombre=$request->nombre;
        $op->descripcion=$request->descripcion;
        $op->ruta=$request->ruta;
        $op->icono_r=$request->icono_r;
        $op->icono_l=$request->icono_l;
        $op->save();

        return redirect('admin/option')->with('status','Opción actualizada!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id){

        $op= Option::findOrFail($id);

        $op->delete();

        return redirect('admin/option')->with('status','Opción eliminada!');
    }
}
