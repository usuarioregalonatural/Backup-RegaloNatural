<?php
/**
 * Created by PhpStorm.
 * User: Victor
 * Date: 03/08/2019
 * Time: 19:13
 */
require_once('../config/config.php');
require_once('../funciones/funciones.php');
require_once('../loginPHP/model/conexion.php');
require_once ('../model/registrabackup.php');


// Recoge el identificador de backup pasado por parametro
$id_backup = $_GET['id'];
$fichero_json_backup=$ruta_json. $id_backup.".json";
$url_json = $_SERVER["HTTP_HOST"]."/jsontrans/".$id_backup.".json" ;

$datos_json=json_decode(file_get_contents($fichero_json_backup),true);

$registro= new Registrabackup();
$registro->Guarda($datos_json);

// Escribe en fichero para pruebas
//$file = fopen("archivo.txt", "w");
/*fwrite($file, $tmp_date_inicio . "-".$tmp_hora_inicio ."\n\r");
fwrite($file, $tmp_date_fin . "-" .$tmp_hora_fin ."\n\r");
fwrite($file, $disk_fs ."\n\r");
fwrite($file, $disk_size ."\n\r");
fwrite($file, $disk_used ."\n\r");
fwrite($file, $disk_available ."\n\r");
fwrite($file, $disk_use_por ."\n\r");
fwrite($file, $disk_mounted_on."\n\r");
fwrite($file, $log_file."\n\r");*/



/*$jid_backup=$datos_json['id'];
$ocupacion_copia=$datos_json['ocupado_copia'];
$jinicio=$datos_json['tiempos']['inicio'];
$jfin=$datos_json['tiempos']['fin'];
$ocupacion_fs=$datos_json['ocupacion']['filesystem'];
$ocupacion_size=$datos_json['ocupacion']['size'];
$ocupacion_used=$datos_json['ocupacion']['used'];
$ocupacion_available=$datos_json['ocupacion']['available'];
$ocupacion_useporcen=$datos_json['ocupacion']['use_por'];
$ocupacion_mountedon=$datos_json['ocupacion']['mountedon'];
*/


/*fwrite($file, "El id del backup es: ". $jid_backup ."\n\r");
fwrite($file, "La copia ocupa: ". $ocupacion_copia ."\n\r");
fwrite($file, "El inicio es: ". $jinicio ."\n\r");
fwrite($file, "El fin es: ". $jfin ."\n\r");
fwrite($file, "El fs es: ". $ocupacion_fs ."\n\r");
fwrite($file, "El size es: ". $ocupacion_size ."\n\r");
fwrite($file, "El used es: ". $ocupacion_used ."\n\r");
fwrite($file, "El available es: ". $ocupacion_available ."\n\r");
fwrite($file, "El usepor es: ". $ocupacion_useporcen ."\n\r");
fwrite($file, "El mountedon es: ". $ocupacion_mountedon ."\n\r");
*/
/*$filejson = fopen($fichero_json_backup, "r");

while(!feof($filejson)) {

    $linea= fgets($filejson);
    fwrite($file, $linea ."\n\r");
}

fclose($filejson);
*/


//fclose($file);

/*echo "El id del backup es: ". $jid_backup ; echo "<br>";
echo "La copia ocupa: ". $ocupacion_copia ; echo "<br>";
echo "El inicio es: ". $jinicio ; echo "<br>";
echo "El fin es: ". $jfin ; echo "<br>";
echo "El fs es: ". $ocupacion_fs ; echo "<br>";
echo "El size es: ". $ocupacion_size ; echo "<br>";
echo "El used es: ". $ocupacion_used ; echo "<br>";
echo "El available es: ". $ocupacion_available ; echo "<br>";
echo "El usepor es: ". $ocupacion_useporcen ; echo "<br>";
echo "El mountedon es: ". $ocupacion_mountedon ; echo "<br>";
*/

//echo "Registrado";



