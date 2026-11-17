<?php
    function vaciarAgenda(){
        $useract = $_SESSION["usuariologin"];
        $_SESSION[$useract] = [];
    }
?>