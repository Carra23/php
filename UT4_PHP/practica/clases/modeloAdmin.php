<?php
    class modeloAdmin{

    public function __construct(
        protected $conexion = new conex()
    )
    {}

    public function validarAdmin($username, $userpass):bool{
            $sql = "SELECT id_administrativo FROM administrativos WHERE user = :user AND password = :pass ";
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