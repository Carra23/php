<?php
    require_once("./BD/conex.php");
    class ModeloProfe{
    
        public function __construct(
            protected $conexion = new conex()
        )
        {}
        
        public function validarProfesor($username, $userpass):bool{
                $sql = "SELECT id_profesor FROM profesores WHERE user = :user AND password = :pass ";
                $sql = $this->conexion->getConexion()->prepare($sql);
                $sql->execute([":user" => $username, ":pass" => $userpass]);
                $result = $sql->fetch(PDO::FETCH_ASSOC);
                if($result != null){
                    $result = true;
                }
                $sql->closeCursor();
                return $result;
        }

        public function modificarPerfil($nombre, $apellido, $contraseña, $id){
            $sql = "UPDATE `profesores` SET `nombre`=:nombre,`apellidos`=:apellidos, `password`=':pass' WHERE id_profesor = :id";
            $sql = $this->conexion->getConexion()->prepare($sql);
            $result = $sql->execute([":nombre" => $nombre, ":apellidos" => $apellido, ":pass" => $contraseña, ":id" => $id]);
            $sql->closeCursor();
            return $result;
        }

        public function getDatos($username):array{
            $sql = "SELECT * FROM profesores WHERE user = :user";
                $sql = $this->conexion->getConexion()->prepare($sql);
                $sql->execute([":user" => $username]);
                $result = $sql->fetch(PDO::FETCH_ASSOC);
                $sql->closeCursor();
                return $result;
        }
    }
?>