<?php
/**
 * Created by PhpStorm.
 * User: Victor
 * Date: 21/09/2019
 * Time: 18:35
 */

require_once('conexionPDOWeb.php');

class Datoscarros extends conexionPDOWeb
{
    public $resultado;
    function obtenerdatos(){

        parent::conectar();
        $consulta = "select id_cart FROM ps_cart where date_add>'2019-09-20';";
        $this->resultado=parent::obtiene_consulta($consulta);
	echo "Estoy consultando!!!!";
        parent::desconectar();
    }

}

