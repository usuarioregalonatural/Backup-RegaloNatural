<?php
/**
 * Created by PhpStorm.
 * User: Victor
 * Date: 21/09/2019
 * Time: 18:35
 */
/*** Clase generica para obtener datos de la Tienda Online  **/
/*** Se le debe pasar la propiedad de la ruta + fichero sql */

require_once('conexionPDOWeb.php');
require_once('../../funciones/funciones.php');

class DatosTienda extends conexionPDOWeb
{
    public $resultado;
    public $ficheroSQL;
    function obtenerdatos(){
        parent::conectar();
//        $consulta=Fichero_SQL("Carros-Pedidos.sql");
        $consulta=Fichero_SQL($this->ficheroSQL);
  //      echo $consulta;
        $this->resultado=parent::obtiene_consulta($consulta);
        parent::desconectar();
    }

}

