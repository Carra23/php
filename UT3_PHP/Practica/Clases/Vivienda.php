<?php
    require_once('ListaViviendas.php');
    require_once('Hipoteca.php');

    abstract class Vivienda extends Hipoteca implements ListaViviendas{
        public function __construct(
            protected $id,
            protected $coste_total,
            protected $superficie
        ){}

        public function eliminar_primera(): Vivienda{
            array_shift($_SESSION['viviendas']);
        }

        public function ordenar_por_coste_total(): array{}

    }
?>