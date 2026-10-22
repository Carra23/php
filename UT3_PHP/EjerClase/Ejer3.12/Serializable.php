<?php
    namespace App;
    trait Serializador {
        public function serializar(){
            return serialize($this);
        }
    }

?>