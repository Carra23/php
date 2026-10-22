<?php
    namespace App;
    require_once('Serializable.php');

    class Libro{

        use Serializador;

        public function __construct(
            protected $titulo,
            protected $autor,
        ){}

        public function toString(){
            return $this->serializar();
        }
    }
?>