<?php
/**
 * Created by PhpStorm.
 * User: Victor
 * Date: 04/08/2019
 * Time: 13:59
 */

class ConexionPDOWeb
{
    # Atributos de la clase conexion
    private $mysqli = '';
    private $usuario = 'vicsoft';
    private $clave = 'vmsn2004';
    private $server ='test.regalonatural.com:51000'; // Deasarrollo
//    private $server ='tienda-test-no-ssl:3306'; // Produccion

    private $db = 'regalonatural';
    private $dbh;
    public $datos;

    public function conectar(){
        try {
//            $dsn = "mysql:host=". $this->server .";dbname=".$this->db . ";port=51000";
            $dsn = "mysql:host=". $this->server .";dbname=".$this->db ;
            $this->dbh = new PDO($dsn, $this->usuario, $this->clave);
        //    echo "Conectado a Web!!!";
            } catch (PDOException $e){
            echo "Error conectando a PDOWeb -> ";
            echo $e->getMessage();
            }
    }

    public function obtiene_consulta($consulta){
        $stmt=$this->dbh->prepare($consulta);
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $stmt->execute();
        $this->datos=$stmt->fetchAll(PDO::FETCH_ASSOC);

        return $this->datos;
    }

    public function desconectar(){
        $this->dbh=null;
    }
}

