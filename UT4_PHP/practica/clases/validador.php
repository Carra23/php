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
                return 1;
            } else if($admin->validarAdmin($username, $userpass) != null){
                return 2;
            } else{
                return 3;
            }
           
        }




    }
?>