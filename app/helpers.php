<?php
/**
 * Created by PhpStorm.
 * User: Usuario
 * Date: 16/04/2017
 * Time: 2:57 PM
 */

function fechaDb($fecha=NULL, $separador='/', $divisor="-"){
    $tmp=explode("$separador",$fecha);

    return $tmp[2].$divisor.$tmp[1].$divisor.$tmp[0];
}
function fecha($fecha=NULL, $separador='-', $divisor="/")
{

    $tmp=explode("$separador",$fecha);

    return $tmp[2].$divisor.$tmp[1].$divisor.$tmp[0];
}