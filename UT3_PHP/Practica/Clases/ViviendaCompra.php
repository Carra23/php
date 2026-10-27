<?php
    require_once('Vivienda.php');
    require_once('Hipoteca.php');

    class ViviendaCompra extends Vivienda{
        protected $cuota = 0;
        public function __construct(
            protected $precio,
            protected $porentrada,
            protected $interes,
            protected $plazo,
            protected $superficie
        ){}

        public function calcularCoste(){
            $r = $this->porentrada / 100;
            $i = $this->interes / 100;
            $entrada = ($this->precio * $r )/ 100;
            $capital = $this->precio - $entrada;
            $this->cuota = Hipoteca::calcularCuotaMensualHipoteca($capital, $i, $this->plazo);
            $this->coste_total = $entrada + 12 * $this->plazo * $this->cuota;
            $this->coste_total = round($this->coste_total, 2);
            $this->cuota = round($this->cuota, 2);
            return $this->coste_total;
        }

        public function imprimirFila(){
            echo "<tr><td>$this->id</td><td>Propia</td><td>$this->precio</td><td>$this->superficie</td><td>$this->plazo</td><td>$this->cuota</td><td>$this->coste_total</td></tr>";
        }
    }
?>