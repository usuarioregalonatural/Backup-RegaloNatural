<?php
/**
 * Created by PhpStorm.
 * User: Victor
 * Date: 23/07/2019
 * Time: 11:39
 */
//require_once ('./model/datosespacio.php');

// isset verifica si existe una variable o eso creo xd
if(isset($_SESSION['id'])){
    header('location: ./loginPHP/controller/redirec.php');
}

// Recupero variables de la url

//$param1=$_GET["parametro1"];
echo "Pagina Principal";

//$datos= new Datosespacio();
//$datos->Ver();
//echo "num-registros: " . $datos->num_registros;

//var_dump($datos->resultado);
//echo "P: " .$datos->ocup_size;
//echo "F: " .$datos->ocup_usado;

//echo $objeto['ocup_size'];



?>

