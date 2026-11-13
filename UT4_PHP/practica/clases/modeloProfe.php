<?php
    class modeloProfe{
    
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
    }
?>