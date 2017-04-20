<?php
/**
 * Created by PhpStorm.
 * User: Usuario
 * Date: 16/04/2017
 * Time: 2:57 PM
 */

/**
 * Cambia el formato de una fecha d/m/Y a Y-m-d
 * @param null $fecha
 * @param string $separador el de la fecha introducida
 * @param string $divisor el de la fecha a devolver
 * @return null|string
 */
function fechaDb($fecha=NULL, $separador='/', $divisor="-"){

    if(is_null($fecha))
        return NULL;

    $tmp=explode("$separador",$fecha);

    return $tmp[2].$divisor.$tmp[1].$divisor.$tmp[0];
}

/**
 * Cambia el formato de una fecha Y-m-d a d/m/Y
 * @param null $fecha
 * @param string $separador el de la fecha introducida
 * @param string $divisor el de la fecha a devolver
 * @return null|string
 */
function fecha($fecha=NULL, $separador='-', $divisor="/"){

    if(is_null($fecha))
        return NULL;

    $tmp=explode("$separador",$fecha);

    return $tmp[2].$divisor.$tmp[1].$divisor.$tmp[0];
}

/**
 * Devuelve la fecha de hoy en formato 'America/Guatemala' 'd/m/Y'
 * @return string
 */
function hoy(){

    return \Carbon\Carbon::now('America/Guatemala')->format('d/m/Y');
}

/**
 * Devuelve la fecha de hoy en formato 'America/Guatemala' 'Y-m-d' para guardar en la base de datos
 * @return string
 */
function hoyDb(){

    return \Carbon\Carbon::now('America/Guatemala')->format('Y-m-d');
}


function diasMes($anio=0,$mes=0){

    if(!$mes && !$anio)
        return false;

    return cal_days_in_month ( CAL_GREGORIAN , $mes , $anio );

}

function diasMesActual(){

    $fechaActual= hoy();

    list($dia,$mes,$anio)=explode('/',$fechaActual);

    return diasMes($anio,$mes);

}

function mesLetras($mes=0){
    if($mes==0)
        return 'mes invalido';

    $meses=['enero','febrero','marzo','abril','mayo','junio','julio','agosto','septiembre','octubre','noviembre','diciembre'];

    return $meses[$mes+1];
}

function arrayDias(){
    $dias=['domingo','lunes','martes','miercoles','jueves','viernes','sabado','domingo',];

    return $dias;
}

function diaLetras($dia=NULL){
    if(is_null($dia))
        return 'día invalido';

    $dias=arrayDias();

    return $dias[$dia];
}