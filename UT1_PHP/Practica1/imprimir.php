<?php
    function imprimir(){
    if(isset($_SESSION["usuariologin"])){
            $useract = $_SESSION["usuariologin"];    
            if(!empty($_SESSION[$useract])){
                foreach($_SESSION[$useract] as $nombre => $item){
                     echo "<p>$nombre | " . $item[0] . " | ". $item[1] . "</p>";
                }
            }
        }
    }
?>