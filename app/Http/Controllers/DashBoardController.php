<?php

namespace App\Http\Controllers;


use Illuminate\Support\Facades\DB;

class DashBoardController extends Controller
{
    public function graficaVentasDia(){

        $horaini = 6;
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

        $horas = array_pluck($results,'monto','hora');

        $horaMaxVenta=max(array_keys($horas));

        $datos=[];
        for($i=$horaini;$i<=$horafin;$i++){

            if($i<$horaMaxVenta){
                $datos[$i]= isset($horas[$i]) ? $horas[$i] : 0 ;
            }else{
                $datos[$i]= isset($horas[$i]) ? $horas[$i] : NULL ;
            }

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

        $dias = array_pluck($results,'monto','dia');

        $diaMaxVenta=max(array_keys($dias));

        $datos=[];
        for($i=1;$i<=$diasMes;$i++){

            if($i<$diaMaxVenta){
                $datos[$i]= isset($dias[$i]) ? $dias[$i] : 0 ;
            }else{
                $datos[$i]= isset($dias[$i]) ? $dias[$i] : NULL ;
            }

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

        $meses = array_pluck($results,'monto','mes');

        $mesMaxVenta=max(array_keys($meses));

        $datos=[];
        for($i=1;$i<=12;$i++){

            if($i<$mesMaxVenta){
                $datos[$i]= isset($meses[$i]) ? $meses[$i] : 0 ;
            }else{
                $datos[$i]= isset($meses[$i]) ? $meses[$i] : NULL ;
            }
        }

//        dd($datos);

        return response()->json(['datos' => $datos]);
    }
}
