<?php
/**
 * Created by PhpStorm.
 * User: Victor
 * Date: 04/08/2019
 * Time: 18:31
 */

// Seteamos la cabecera a JSON
header('Content-Type: application/json');

/*
define('DB_HOST', 'backup.regalonatural.com:33060');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', 'vmsn2004');
define('DB_NAME', 'login');
echo "Conectados bd graficos";
$mysqli = new mysqli(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_NAME);

$mysqli->query("SET NAMES 'utf8'");

if(!$mysqli){
    die("La Conexión ha fallado: " . $mysqli->error);
}

$query = sprintf("select DATE_FORMAT(fx_inicio,'%d/%m/%Y'), timediff(fx_fin, fx_inicio) as duracion from registro_backup");

$result = $mysqli->query($query);

$data = array();
foreach ($result as $row) {
    $data[] = $row;
}

$result->close();

$mysqli->close();
*/
require_once('../config/config.php');

 $usuario = 'root';
 $clave = 'vmsn2004';
// $server = 'backup.regalonatural.com:33060'; // Produccion
 $server=$gbl_servidor;
 $db = 'login';
 $dbh=null;
 $dsn = "mysql:host=". $server .";dbname=".$db;
 $consulta="select DATE_FORMAT(fx_inicio,'%d/%m/%Y') as fx_inicio, time_to_sec(timediff(fx_fin, fx_inicio)) as duracion from registro_backup";
try {

    $dbh = new PDO($dsn, $usuario, $clave);
    $stmt=$dbh->prepare($consulta);
    $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $stmt->execute();
    $data=$stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e){
    echo $e->getMessage();
}
// Mostramos los datos en formato JSON
print json_encode($data);

//var_dump($data);