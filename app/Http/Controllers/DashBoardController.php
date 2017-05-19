<?php

namespace App\Http\Controllers;


use App\Models\Horario;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class DashBoardController extends Controller
{
    public function graficaVentasDia(){

        $diaSemana=Carbon::now()->dayOfWeek;
        $diaSemana = $diaSemana==0 ? 7 : $diaSemana;

        $horarios= Horario::where('dia','=',$diaSemana)->get();

        $horaini = $horarios[0]->hora_ini;
        $horafin = $horarios[0]->hora_fin;

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

        $horaActual= Carbon::now()->hour;

        $datos=[];
        for($i=$horaini;$i<=$horafin;$i++){

            if($i<=$horaActual){
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
    public function graficaVentasDia2(){

        $diaSemana=Carbon::now()->dayOfWeek;
        $diaSemana = $diaSemana==0 ? 7 : $diaSemana;

        $horarios= Horario::where('dia','=',$diaSemana)->get();

        $horaini = $horarios[0]->hora_ini;
        $horafin = $horarios[0]->hora_fin;

        $results = DB::select( DB::raw("
            select 
                date_format(v.created_at,'%h.%i') hora
                ,sum((d.cantidad* d.precio)) monto
            from 
                ventas v inner join venta_detalles d on v.id= d.venta_id
            where
                v.fecha=curdate()
                and v.vestado_id=2
            group by
                1
        ") );

        $horas = array_pluck($results,'monto','hora');


        return response()->json([
            'horaini' => $horaini,
            'horafin' => $horafin,
            'datos' => $horas
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

        $diaActual=Carbon::now()->day;

        $datos=[];
        for($i=1;$i<=$diasMes;$i++){

            if($i<=$diaActual){
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

        $mesActual=Carbon::now()->month;

        $datos=[];
        for($i=1;$i<=12;$i++){

            if($i<=$mesActual){
                $datos[$i]= isset($meses[$i]) ? $meses[$i] : 0 ;
            }else{
                $datos[$i]= isset($meses[$i]) ? $meses[$i] : NULL ;
            }
        }

        return response()->json(['datos' => $datos]);
    }
}
