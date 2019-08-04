<?php
/**
 * Created by PhpStorm.
 * User: Victor
 * Date: 04/08/2019
 * Time: 14:03
 */
require_once('conexionPDO.php');

class Datosdeejecuciones extends conexionPDO
{
    public $resultado;
    function obtenerdatos(){

        parent::conectar();
        $consulta = "select id_backup, fx_inicio, fx_fin, timediff(fx_fin, fx_inicio) as duracion, size_fs, ocup_size, ocup_usado, ocup_available from registro_backup order by fx_inicio desc ;";
        $this->resultado=parent::obtiene_consulta($consulta);
        parent::desconectar();
    }

}