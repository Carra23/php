<?php
    abstract class Vivienda{
        public function __construct(
            protected $id,
            protected $coste_total,
            protected $superficie
        ){}

        abstract function calcularCoste();

        abstract function imprimirFila();

        public function setID($idn){
            $this->id = $idn;
        }

        public function getCosteTotal(){
            return $this->coste_total;
        }
    }
?>