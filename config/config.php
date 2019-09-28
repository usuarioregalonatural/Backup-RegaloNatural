<?php
/**
 * Created by PhpStorm.
 * User: Victor
 * Date: 03/08/2019
 * Time: 18:38
 */

$entorno="Desarrollo";
//$entorno="Produccion";

$ruta="miruta";

 $ruta_json="../jsontrans/";
# $gbl_servidor = 'backup.regalonatural.com:33060'; // Desarrollo
//$gbl_servidor='172.22.0.2:3306'; // Produccion
//$gbl_servidor='172.29.0.2:3306'; // Produccion

if ($entorno=="Desarrollo"){
    $gbl_servidor_backup='backup.regalonatural.com:33060'; // Produccion
} else {
    $gbl_servidor_backup = 'backup_bbdd:3306'; // Produccion
}


