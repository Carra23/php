<?php
    require_once("./BD/conex.php");
    class ModeloCurso{
    
        public function __construct(
            protected $conexion = new conex()
        )
        {}
        

        public function getCursos():array{
            $sql = "SELECT * FROM cursos";
            $sql = $this->conexion->getConexion()->prepare($sql);
            $sql->execute();
            $result = $sql->fetchAll(PDO::FETCH_ASSOC);
            $sql->closeCursor();
            return $result;
        }


        public function crearCurso($nombre, $descripcion, $duracion, $idprofe):bool{
            $sql = "INSERT INTO cursos ( `nombre_curso`, `descripcion`, `duracion`, `id_profesor`) VALUES (:nombre, :descripcion, :duracion, :idprofesor)";
            $sql = $this->conexion->getConexion()->prepare($sql);
            $result = $sql->execute([":nombre" => $nombre, ":descripcion" => $descripcion, ":duracion" => $duracion, ":idprofesor" => $idprofe]);
            $sql->closeCursor();
            return $result;
        }


        public function eliminarCurso($id):bool{
            $sql = "DELETE FROM cursos WHERE id_curso = :id";
            $sql = $this->conexion->getConexion()->prepare($sql);
            $result = $sql->execute([":id" => $id]);
            $sql->closeCursor();
            return $result;
        }

    }
?>