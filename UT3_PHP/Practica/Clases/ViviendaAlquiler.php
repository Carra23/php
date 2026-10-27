<?php
    require_once('Vivienda.php');

    class ViviendaAlquiler extends Vivienda{
        public function __construct(
            protected $renta,
            protected $subida,
            protected $plazo,
            protected $superficie
        ){}

        public function calcularCoste(){
            if ($this->subida != 0){
                $s = $this->subida / 100;
                $this->coste_total = 12 * $this->renta * (pow(1 + $s, $this->plazo) - 1) / $s;
                $this->coste_total = round($this->coste_total, 2);
                return $this->coste_total;
            }else{
                $this->coste_total = 12 * $this->renta * $this->plazo;
                return $this->coste_total;
            }
        }

        public function imprimirFila(){
            echo "<tr><td>$this->id</td><td>Alquiler</td><td>$this->renta</td><td>$this->superficie</td><td>$this->plazo</td><td></td><td>$this->coste_total</td></tr>";
        }


    }
?>