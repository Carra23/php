<?php
    class Coche{

        public function __construct(
            public $marca,
            public $modelo
        )
        {}

        public function arrancar(){
            echo "El coche: " . $this->marca . " ha arrancado";
        }
    }
?>