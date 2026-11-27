<?php
    require_once 'config/Conexion.php';
    class UsuarioModel{
        private PDO $conexion;

        public function __construct(){
            $conexion = new Conexion();
            $this->conexion = $conexion->getConexion();
        }

        public function getUsuarios():array{
            $sql = 'SELECT * FROM usuarios';
            $stmt = $this->conexion->prepare($sql);
            $stmt->execute();
            $usuarios = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $usuarios;
        }

        public function getUsuarioID($id):array{
            $sql = 'SELECT * FROM usuarios WHERE id_usuario = :id';
            $stmt = $this->conexion->prepare($sql);
            $stmt->execute([":id" => $id]);
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $result;
        }
    }
?>