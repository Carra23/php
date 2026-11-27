<?php
    require_once("config.php");
    class Conexion {
        private PDO $conexion_DB;
        
        public function __construct(){
        try{
            $this->conexion_DB = new PDO(
                "mysql:host=" .DB_HOST.
                ";dbname=".DB_DB,
                DB_USUARIO,
                DB_CONTRA);
            $this->conexion_DB->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        }catch (Exception $e){
            echo $e->getMessage();
        }
        
        }

        public function getConexion():PDO{
            return $this->conexion_DB;
        }
    }