<?php
    require_once('Vehiculo.php');

    class Bicicleta extends Vehiculo{
        
        public function __construct(
            protected $velmax
        ){
            parent::__construct($velmax);
        }

        public function arrancar(){
            echo "<p>La bicicleta ha arrancado</p>";
        }

        public function parar(){
            echo "<p>La bicicleta ha parado</p>";
        }

        public function pedalear(){
            echo "<p>Estas pedaleando";
        }
    }
?>