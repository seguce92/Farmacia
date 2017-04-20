<?php

namespace App\Http\Controllers;


use Illuminate\Support\Facades\DB;

class DashBoardController extends Controller
{
    public function graficaVentasDia(){

        $horaini = 8;
        $horafin = 21;

        $results = DB::select( DB::raw("
            select 
                hour(v.created_at) hora,sum((d.cantidad* d.precio)) monto
            from 
                ventas v inner join venta_detalles d on v.id= d.venta_id
            where
                v.fecha=curdate()
                and v.vestado_id=2
            group by
                1
        ") );

        $results = array_pluck($results,'monto','hora');

        $datos=[];
        for($i=$horaini;$i<=$horafin;$i++){

            $datos[$i]= isset($results[$i]) ? $results[$i] : 0 ;
        }


        return response()->json([
            'horaini' => $horaini,
            'horafin' => $horafin,
            'datos' => $datos
        ]);


    }

    public function graficaVentasMes(){

        $diasMes=diasMesActual();

        $results = DB::select( DB::raw("
            select 
                day(v.created_at) dia,sum((d.cantidad* d.precio)) monto
            from 
                ventas v inner join venta_detalles d on v.id= d.venta_id
            where
                month(v.fecha)=MONTH(CURDATE())
                and v.vestado_id=2
            group by
                1
        ") );

        $results = array_pluck($results,'monto','dia');

        $datos=[];
        for($i=1;$i<=$diasMes;$i++){

            $datos[$i]= isset($results[$i]) ? $results[$i] : 0 ;
        }

        return response()->json([
            'diasmes' => $diasMes,
            'datos' => $datos
        ]);
    }

    public function graficaVentasAnio(){

        $results = DB::select( DB::raw("
            select 
                month(v.created_at) mes,sum((d.cantidad* d.precio)) monto
            from 
                ventas v inner join venta_detalles d on v.id= d.venta_id
            where
                year(v.fecha)=year(CURDATE())
                and v.vestado_id=2
            group by
                1
        ") );

        $results = array_pluck($results,'monto','mes');

        $datos=[];
        for($i=1;$i<=12;$i++){

            $datos[$i]= isset($results[$i]) ? $results[$i] : 0 ;
        }

        return response()->json(['datos' => $datos]);
    }
}
