<?php
    require_once("config.php");

    class conex{
        protected $conexion;
        public function __construct(){
            try{
                $this->conexion = new PDO("mysql:host=" . DB_HOST . ";dbname=" . DB_NOMBRE . "", DB_USER, DB_PASS);
                $this->conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            }catch (Exception $e){
                die("Error: " . $e->getMessage());
            }
        }

        public function getConexion(){
            return $this->conexion;
        }
    }
?>