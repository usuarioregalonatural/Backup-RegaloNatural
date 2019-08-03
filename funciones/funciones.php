<?php
/**
 * Created by PhpStorm.
 * User: Victor
 * Date: 03/08/2019
 * Time: 19:37
 */

function CambiaTexto($textoorigen){
    $tmptexto=$textoorigen . "hola";
    return $tmptexto;
}

function ExtraeFecha($cadena){
    $separador="-";
    $tmpanyo=substr($cadena,0,4);
    $tmpmes=substr($cadena,4,2);
    $tmpdia=substr($cadena,6,2);

    $tmpresultado=$tmpanyo . $separador . $tmpmes . $separador . $tmpdia;
    return $tmpresultado;
}

function ExtraeHora($cadena){
    $separador=":";
    $tmphora=substr($cadena,8,2);
    $tmpminuto=substr($cadena,10,2);
    $tmpsegundo=substr($cadena,12,2);

    $tmpresultado=$tmphora . $separador . $tmpminuto . $separador . $tmpsegundo;
    return $tmpresultado;
}

function LeeJson($archivo){
    $datos=json_decode(file($archivo),true);

}