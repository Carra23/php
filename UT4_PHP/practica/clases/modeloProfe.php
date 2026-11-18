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
            $sql = "UPDATE `profesores` SET `nombre`=:nombre, `apellidos`=:apellidos, `password`=:pass WHERE id_profesor = :id";
            $sql = $this->conexion->getConexion()->prepare($sql);
            $result = $sql->execute([":nombre" => $nombre, ":apellidos" => $apellido, ":pass" => $contraseña, ":id" => $id]);
            $sql->closeCursor();
            return $result;
        }

        public function calificar($idCurso, $idAlumno, $nota){
            $existe = false;
            $sql = "SELECT id_alumno FROM calificaciones WHERE id_curso = :idCurso";
            $sql = $this->conexion->getConexion()->prepare($sql);
            $sql->execute([":idCurso" => $idCurso]);
            $result = $sql->fetchAll(PDO::FETCH_ASSOC);
            foreach ($result as $alumno){
                if ($alumno['id_alumno'] == $idAlumno){
                    $existe = true;
                }
            }
            if ($existe){
                $sql = "UPDATE `calificaciones` SET `nota` = :nota WHERE id_alumno = :id AND id_curso = :idCurso;";
                $sql = $this->conexion->getConexion()->prepare($sql);
                $sql->execute([":id" => $idAlumno, ":nota" => $nota, ":idCurso" => $idCurso]);
                $result = $sql->execute([":id" => $idAlumno, ":nota" => $nota, ":idCurso" => $idCurso]);
                $sql->closeCursor();
                return $result;
            }else{
                $fecha = date('Y-m-d');
                $sql = "INSERT INTO `calificaciones`(`id_alumno`, `id_curso`, `nota`, `fecha_calificacion`) VALUES (:alumno,:curso,:nota,:fecha)";
                $sql = $this->conexion->getConexion()->prepare($sql);
                $sql->execute([":alumno" => $idAlumno, ":curso" => $idCurso, ":nota" => $nota, ":fecha" => $fecha]);
                $result = $sql->fetch(PDO::FETCH_ASSOC);
                $sql->closeCursor();
                return $result;
            }
        }

        public function insertar($nombre, $apellido, $user, $pass){
            $sql = "INSERT INTO profesores ( `nombre`, `apellidos`, `user`, `password`) VALUES (:nombre, :apellidos, :user, :pass)";
            $sql = $this->conexion->getConexion()->prepare($sql);
            $result = $sql->execute([":nombre" => $nombre, ":apellidos" => $apellido, ":user" => $user, ":pass" => $pass]);
            $sql->closeCursor();
            return $result;
        }

        public function eliminar($id){
            $sql = "DELETE FROM profesores WHERE id_profesor = :id";
            $sql = $this->conexion->getConexion()->prepare($sql);
            $result = $sql->execute([":id" => $id]);
            $sql->closeCursor();
            return $result;
        }

        public function getProfesores(){
            $sql = "SELECT profesores.id_profesor, nombre, apellidos, nombre_curso FROM profesores LEFT JOIN cursos USING(id_profesor);";
            $sql = $this->conexion->getConexion()->prepare($sql);
            $sql->execute();
            $result = $sql->fetchAll(PDO::FETCH_ASSOC);
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