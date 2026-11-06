<?php
    require_once("config.php");

    class Conexion{
        protected $conexion;
        public function __construct(){
            try{
                $this->conexion = new PDO("mysql:host=" . DB_HOST . ";dbname=" . DB_NOMBRE . "", DB_USER, DB_PASS);
                $this->conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $this->conexion->exec("SET CHARSET SET ". DB_CHARSET);
            }catch (Exception $e){
                die("Error: " . $e->getMessage());
            }
        }
    }
?>