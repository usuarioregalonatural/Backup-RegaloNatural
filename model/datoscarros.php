<?php
/**
 * Created by PhpStorm.
 * User: Victor
 * Date: 21/09/2019
 * Time: 18:35
 */

require_once('conexionPDOWeb.php');
require_once('../../funciones/funciones.php');

class Datoscarros extends conexionPDOWeb
{
    public $resultado;
    function obtenerdatos(){
        parent::conectar();
        $consulta=Fichero_SQL("../../SQL/" . "Datoscarros.sql");
  //      echo $consulta;
        $this->resultado=parent::obtiene_consulta($consulta);
        parent::desconectar();
    }

}

