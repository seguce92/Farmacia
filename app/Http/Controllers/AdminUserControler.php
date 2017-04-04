<?php

namespace App\Http\Controllers;

use App\DataTables\UserDataTables;
use App\Option;
use App\Rol;
use App\User;
use Facades\App\Menu;
use Illuminate\Http\Request;

class AdminUserControler extends Controller
{
    /**
     * AdminUserControler constructor.
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
    public function index(UserDataTables $dataTables)
    {
        return $dataTables->render('admin.user.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(User $user)
    {
        $rols = Rol::all();
        $rolsUser= [];
        $create= 1;
        //dd($rols);
        return view("admin.user.create",compact('user','rols','rolsUser','create'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {

        $rols = Rol::all();
        $rolsUser = array_pluck($user->rols->toArray(),"id");

        return view("admin.user.edit",compact('user','rols','rolsUser'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function editProfile(User $user)
    {
        $editProfile=1;
        return view("admin.user.edit",compact('user','editProfile'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $user->name = $request->name;
        $user->username = $request->username;
        $user->email = $request->email;


        if(!is_null($request->password) && !is_null($request->password_confirmation)){
            $user->password = bcrypt($request->password);
        }

        $user->save();

        if($request->editProfile){
            return redirect(route('user.edit.profile',["user" => $user->id,"editProfile"=> 1 ]))->with('status', 'Perfil actualizado!');
        }
        else{
            $rols = $request->rols ? $request->rols : [];
            $user->rols()->sync($rols);
            return redirect(route('user.edit',$user->id))->with('status', 'Usuario actualizado!');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $user->delete();

        return redirect("admin/user")->with("status","Usuario eliminado correctamente");
    }


    /**
     * Muestra al vista para poder asignar opciones del menu a un usuario
     *
     * @param $id id del usuario
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function menu(User $user){

        $opciones= Option::all();
        $menu= Menu::renderUser($opciones,0,$user);

        return view("admin.user.menu",compact('user','menu'));
    }

    /**
     * Guarda lsa opciones de menu que se decidieron asignar al usuario
     *
     * @param Request $request
     * @param $id usuario
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function menuStore(Request $request,User $user){

        $opciones = is_null($request->opciones) ? array() : $request->opciones;

        $user->opciones()->sync($opciones);

        return redirect("admin/user/{$user->id}/menu")->with("status","Opciones asignadas!");
    }
}
