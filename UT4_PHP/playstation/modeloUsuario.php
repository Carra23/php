<?php
    require_once("conexion.php");

    class modeloUsuario extends Conexion{
        public function __construct()
        {
            parent::__construct();
        }

        public function getUserID($id):array{
            $sql = "SELECT * FROM playstation WHERE userid = :id";
            $sql = $this->conexion->prepare($sql);
            $sql->execute(array(":id" => $id));
            $result = $sql->fetchAll(PDO::FETCH_ASSOC);
            $sql->closeCursor();
            return $result;
        }

        public function getUsers():array{
            $sql = "SELECT * FROM playstation";
            $sql = $this->conexion->prepare($sql);
            $sql->execute();
            $result = $sql->fetchAll(PDO::FETCH_ASSOC);
            $sql->closeCursor();
            return $result;
        }

        public function insertUser($username, $userpass):bool{
            $sql = "INSERT INTO `usuario`(`username`, `userpass`) VALUES (':user',':pass')";
            $sql = $this->conexion->prepare($sql);
            $sql->execute(array(":user" => $username, ":pass" => $userpass));
            $result = $sql;
            $sql->closeCursor();
            return $result;
        }

    }
?>