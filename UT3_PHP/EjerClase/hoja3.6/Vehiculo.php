<?php
    abstract class Vehiculo{

        public function __construct(
            protected $velmax,
        ){}

        abstract public function arrancar();
        abstract public function parar();
        
        public function getVelocidadMax(){
            echo "<p>La velocidad máxima es: $this->velmax km/h</p>";
        }
    }
?>