<?php
    class Inventario{
        
        public $almacen = [];
        
        public function __construct(
            
        ){}

        public function añadir($producto){
            $this->almacen[$producto] = 0;
        }

        public function eliminar($producto){
            unset($this->almacen[$producto]);
        }

        public function setCantidad($producto, $cantidad){
            $this->almacen[$producto] = $cantidad;
        }

        public function imprimir(){
            print_r($this->almacen);
        }
    }
?>