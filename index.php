<?php
/**
 * Created by PhpStorm.
 * User: Victor
 * Date: 23/07/2019
 * Time: 11:39
 */
//require_once ('./model/datosespacio.php');

// isset verifica si existe una variable o eso creo xd

// Anulado temporalmente
//if(isset($_SESSION['id'])){
//    header('location: ./loginPHP/controller/redirec.php');
//}
// fin Anulado temporalmente




require_once __DIR__ . '/vendor/autoload.php';

// 3- Si no hemos solicitado acceso en ningún momento, procedemos a solicitar acceso para recoger el access_token y el refresh_token para almacenarlos.
$redirect_uri = 'http://' . $_SERVER['HTTP_HOST'] . '/oauth2callback.php';
header('Location: ' . filter_var($redirect_uri, FILTER_SANITIZE_URL));


//echo $redirect_uri;


?>

