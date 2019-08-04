<?php
/**
 * Created by PhpStorm.
 * User: Victor
 * Date: 04/08/2019
 * Time: 3:37
 */
require_once('../../loginPHP/model/conexion.php');

class Datosejecuciones extends Conexion
{

    public $num_registros;
    public $resultado;

    public function Obtener()
    {
        parent::conectar();

        $consulta = "select id_backup, fx_inicio, fx_fin, timediff(fx_fin, fx_inicio) as duracion, size_fs, ocup_size, ocup_usado, ocup_available from registro_backup order by fx_inicio desc";
        parent::query($consulta);
        $this->num_registros = parent::verificarRegistros($consulta);
  //      $this->resultado = parent::consultaArreglo($consulta);
        $this->resultado = parent::devuelveRegistros($consulta);
        echo "Los drivers son: " .var_dump(PDO::getAvailableDrivers());
        parent::cerrar();

    }
}