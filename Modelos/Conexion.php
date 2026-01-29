<?php
require_once 'config/configDB.php';

class Conexion{
    protected $conexion;

    public function __construct(){
        try {
            $dsn = 'mysql:host='.HOST.';dbname='.DBNAME.';charset=utf8';
            $this->conexion = new PDO($dsn, USER, PASSWORD);
            $this->conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            echo "Error de conexión: " . $e->getMessage();
            die();
        }
    }
}
?>
