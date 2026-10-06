<?php
    function regContacto(){
        if(isset($_SESSION["usuariologin"])){
            $useract = $_SESSION["usuariologin"];

            if(isset($_POST["nnombre"]) && $_POST["nnombre"] != ""){
                if(isset($_POST["nnumero"]) && $_POST["nnumero"] != ""){
                    if(isset($_POST["localidad"])){
                        $_SESSION[$useract][$_POST["nnombre"]] = [$_POST["nnumero"], $_POST["localidad"]];
                    }
                }else{
                    unset($_SESSION[$useract][$_POST["nnombre"]]);
                }
            }else{
                echo "<h2>Nombre vacio</h2>";
            }
        }
    }
?>