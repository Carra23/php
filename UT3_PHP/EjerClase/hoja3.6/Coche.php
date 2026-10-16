<?php
    require_once('Vehiculo.php');

    class Coche extends Vehiculo{

        public function __construct(
            protected $velmax
        ){
            parent::__construct($velmax);
        }

        public function arrancar(){
            echo "<p>El coche ha arrancado</p>";
        }
        public function parar(){
            echo "<p>El coche ha parado</p>";
        }
    }
?>