<?php
    require_once('ListaViviendas.php');

    class ColeccionViviendas implements ListaViviendas{
        
        public function __construct(){}
        public function insertar_vivienda($vivienda){
            $vivienda->setID("Vivienda " . $_SESSION["contador"]);
            array_push($_SESSION["viviendas"], $vivienda);
            $_SESSION["contador"] = $_SESSION["contador"] + 1;
        }

        public function eliminar_primera(): Vivienda{
            $vivienda0 = $_SESSION['viviendas'][0];
            array_shift($_SESSION['viviendas']);
            return $vivienda0;
        }

        public function ordenar_por_coste_total(): array{
            $nuevoarray = $_SESSION['viviendas'];
                    usort($nuevoarray, function($a, $b){
                        return $a->getCosteTotal() <=> $b->getCosteTotal();
                    });
            return $nuevoarray;
        }

        public function imprimirTabla($array){
            echo "<table style='border: 5px solid black; width: 100%; text-align: center;'>";
            echo "<tr><th>ID</th><th>TIPO</th><th>PRECIO/RENTA</th><th>SUPERFICIE</th><th>PLAZO</th><th>CUOTA</th><th>COSTE TOTAL</th></tr>";
            foreach($array as $vivienda){
                $vivienda->imprimirFila();
            }
            echo "</table>";
        }
    }
?>