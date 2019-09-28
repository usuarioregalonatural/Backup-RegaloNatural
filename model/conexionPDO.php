<?php
/**
 * Created by PhpStorm.
 * User: Victor
 * Date: 04/08/2019
 * Time: 13:59
 */

class ConexionPDO
{
    # Atributos de la clase conexion
    private $mysqli = '';
    private $usuario = 'root';
    private $clave = 'vmsn2004';
 //   private $server = 'backup.regalonatural.com:33060'; // Desarrollo
   private $server ='backup_bbdd:3306'; // Produccion

    private $db = 'login';
    private $dbh;
    public $datos;
    public $cnx_host;
    public $cnx_user;
    public $cnx_pass;

    public function conectar(){
        try {
            $dsn = "mysql:host=". $this->server .";dbname=".$this->db;
//            $dsn = "mysql:host=". $this->cnx_host .";dbname=".$this->db;
            $this->dbh = new PDO($dsn, $this->usuario, $this->clave);
            } catch (PDOException $e){
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

