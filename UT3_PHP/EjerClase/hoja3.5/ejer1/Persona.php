<?php
    class Persona{

        public function __construct(
            protected $nombre,
            protected $edad,
        ){}

        public function presentarse(){
            echo "<p>Mi nombre es $this->nombre y tengo $this->edad.</p>";
        }
    }
?>