<?php
    require_once("./clases/modeloProfe.php");
    require_once("./clases/modeloAdmin.php");

    class validador{
        public function __construct()
        {}
        
        public function validar($username, $userpass){
            $profe = new modeloProfe();
            $admin = new modeloAdmin();
            if($profe->validarProfesor($username, $userpass) != null){
                return "profesor";
            } else if($admin->validarAdmin($username, $userpass) != null){
                return "admin";
            } else{
                return "error";
            }
           
        }




    }
?>