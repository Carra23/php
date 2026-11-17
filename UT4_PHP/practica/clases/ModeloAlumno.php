<?php
    require_once("./BD/conex.php");
    class ModeloAlumno{
    
        public function __construct(
            protected $conexion = new conex()
        )
        {}
        

        public function getAlumnos(){
            $sql = "SELECT id_alumno, nombre, email, alumnos.id_curso, nota FROM alumnos JOIN calificaciones USING(id_alumno);";
            $sql = $this->conexion->getConexion()->prepare($sql);
            $sql->execute();
            $result = $sql->fetchAll(PDO::FETCH_ASSOC);
            $sql->closeCursor();
            return $result;
        }

        public function asignarAlumnos($idalum, $idcurso){
            $sql = "UPDATE `alumnos` SET `id_curso`=:idcurso WHERE id_alumno = :idalumno";
            $sql = $this->conexion->getConexion()->prepare($sql);
            $result = $sql->execute([":idcurso" => $idcurso, ":idalumno" => $idalum]);
            $sql->closeCursor();
            return $result;
        }

        public function calificarAlumno(){}

    }
?>