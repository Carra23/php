<?php
    require_once('Vehiculo.php');

    class Camion extends Vehiculo{

        public function __construct(
            protected $velmax
        ){
            parent::__construct($velmax);
        }

        public function arrancar(){
            echo "<p>El camion ha arrancado</p>";
        }

        public function parar(){
            echo "<p>El camion ha parado</p>";
        }

        public function cargarMercancia($cantidad){
            echo "<p>Se han cargado $cantidad kg más";
        }
    }
?>