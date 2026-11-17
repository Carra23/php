<?php
    class Curso {
        protected $nombre;
        protected $alumnos = [];

        public function __construct($nombre) {
            $this->nombre = $nombre;
        }

        public function inscribir($alumno) {
            $this->alumnos[$alumno] = null;
        }

        public function asignarNota($nota, $alumno) {
            $this->alumnos[$alumno] = $nota;
        }
    }
?>