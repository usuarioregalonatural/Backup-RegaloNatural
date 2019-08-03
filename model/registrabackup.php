<?php
/**
 * Created by PhpStorm.
 * User: Victor
 * Date: 03/08/2019
 * Time: 20:52
 */

require_once('../loginPHP/model/conexion.php');

class Registrabackup extends Conexion
{


    public function Guarda($datos_json){
        parent::conectar();


        $jid_backup=$datos_json['id'];
        $ocupacion_copia=$datos_json['ocupado_copia'];
        $jinicio=$datos_json['tiempos']['inicio'];
        $jfin=$datos_json['tiempos']['fin'];
        $ocupacion_fs=$datos_json['ocupacion']['filesystem'];
        $ocupacion_size=$datos_json['ocupacion']['size'];
        $ocupacion_used=$datos_json['ocupacion']['used'];
        $ocupacion_available=$datos_json['ocupacion']['available'];
        $ocupacion_useporcen=$datos_json['ocupacion']['use_por'];
        $ocupacion_mountedon=$datos_json['ocupacion']['mountedon'];

        if ($ocupacion_copia == NULL){
            $ocupacion_copia=0;
        }
        $sinicio=A_Fecha_Mysql($jinicio);
        $sfin=A_Fecha_Mysql($jfin);
        $consulta="insert into registro_backup values ($jid_backup,'$sinicio','$sfin', $ocupacion_copia,'$ocupacion_fs',$ocupacion_size, $ocupacion_used,$ocupacion_available,'$ocupacion_useporcen','$ocupacion_mountedon' );";
        parent::query($consulta);

        parent::cerrar();

    }
}