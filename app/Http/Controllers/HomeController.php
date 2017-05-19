<?php

/*
 * Taken from
 * https://github.com/laravel/framework/blob/5.3/src/Illuminate/Auth/Console/stubs/make/controllers/HomeController.stub
 */

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Models\Venta;
use Carbon\Carbon;
use Faker\Test\Provider\LocalizationTest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

/**
 * Class HomeController
 * @package App\Http\Controllers
 */
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');

    }

    /**
     * Show the application dashboard.
     *
     * @return Response
     */
    public function index(){

        $user = Auth::user();

        if($user->isAdmin()){
            $ventas= Venta::where('fecha','=',hoyDb())
                ->where('vestado_id','=','2')
                ->get();

            //dd($ventas);

            $totalDia=0;
            foreach ($ventas as $venta){
                foreach ($venta->ventaDetalles as $detalle){
                    $totalDia+=($detalle->precio*$detalle->cantidad);
                }
            }

            $cntVentas=$ventas->count();

            return view('admin.dashboard',compact('totalDia','cntVentas'));

        }else{

            return view('home');
        }


    }
}