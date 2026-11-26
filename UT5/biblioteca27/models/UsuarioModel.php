<?php
    require_once('../config/Conexion.php');
    class UsuarioModel{
        private PDO $conexion;

        public function __construct()
        {
            $conexion = new Conexion();
            $this->conexion = $conexion->getConexion();
        }

        public function listarUsuarios():array{
            $sql = "SELECT * FROM usuarios";
            $sql = $this->conexion->prepare($sql);
            $sql->execute();
            $usuarios = $sql->fetchAll(PDO::FETCH_ASSOC);
            $sql->closeCursor();
            return $usuarios;
        }
    }
?>