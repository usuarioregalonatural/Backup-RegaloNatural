<?php
/**
 * Created by PhpStorm.
 * User: Victor
 * Date: 03/08/2019
 * Time: 20:52
 */

require_once('../../loginPHP/model/conexion.php');

class Datosespacio extends Conexion
{

    public $ocup_size;
    public $ocup_size_formateado;
    public $ocup_usado;
    public $ocup_usado_formateado;

    public $ocup_available;
    public $num_registros;
    public $resultado;

    public function Ver(){
        parent::conectar();

        $consulta="select ocup_size, ocup_usado, ocup_available from registro_backup where fx_inicio in (select max(fx_inicio) from registro_backup)";
        parent::query($consulta);
        $this->num_registros=parent::verificarRegistros($consulta);
        $this->resultado=parent::consultaArreglo($consulta);
        $this->ocup_size=$this->resultado['ocup_size'];
        $this->ocup_usado=$this->resultado['ocup_usado'];

        $this->ocup_size_formateado=number_format($this->ocup_size/1024/1024);
        $this->ocup_usado_formateado=number_format($this->ocup_usado/1024/1024);
        parent::cerrar();



///
 /*       $jid_backup=$datos_json['id'];
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
*/
    }
}