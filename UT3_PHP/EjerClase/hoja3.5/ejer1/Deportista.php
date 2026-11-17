<?php
    require("Persona.php");
    require("Saludable.php");

    class Deportista extends Persona implements Saludable{
        public function realizarEjercicio(){
            echo "<p>La persona esta haciendo ejercicio";
            parent::presentarse();
        }
    }
?>