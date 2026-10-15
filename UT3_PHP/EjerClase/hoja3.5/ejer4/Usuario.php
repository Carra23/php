<?php
    class Usuario implements Autenticable, Registrable{
        public function __construct(
            private $usuario,
            private $contraseña,
        ){}

        public function getUsuario(){
            echo "<p>$this->usuario</p>";
        }

        public function getContraseña(){
            echo "<p>$this->contraseña</p>";
        }

        public function setUsuario($user){
            $this->usuario = $user;
        }

        public function setContraseña($pass){
            $this->contraseña = $pass;
        }
    }
?>