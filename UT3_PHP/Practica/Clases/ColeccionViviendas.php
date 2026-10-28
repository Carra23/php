<?php
    require_once('ListaViviendas.php');

    class ColeccionViviendas implements ListaViviendas{

        protected $arrayViv;
        
        public function __construct(){
            if(isset($_SESSION['viviendas'])){
                $this->arrayViv = $_SESSION['viviendas']->getArray();
            }else{
                $this->arrayViv = [];
            }
        }
        public function insertar_vivienda($vivienda){
            $vivienda->setID("Vivienda " . $_SESSION["contador"]);
            array_push($this->arrayViv, $vivienda);
            $_SESSION["contador"] = $_SESSION["contador"] + 1;
            $_SESSION['viviendas'] = $this;
        }

        public function eliminar_primera(): Vivienda{
            if(isset($this->arrayViv[0])){
                $vivienda0 = $this->arrayViv[0];
                array_shift($this->arrayViv);
                $_SESSION['viviendas'] = $this;
                return $vivienda0;
            }
        }

        public function ordenar_por_coste_total(): array{
            $nuevoarray = $_SESSION['viviendas']->getArray();
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

        public function getArray(){
            return $this->arrayViv;
        }
    }
?>