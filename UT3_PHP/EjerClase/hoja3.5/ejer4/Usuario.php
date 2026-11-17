<?php
    class Usuario implements Autenticable, Registrable{
        public function __construct(
            private $usuario,
            private $contraseña,
        ){}

        public function registrarUsuario($user, $pass){
            $this->usuario = $user;
            $this->contraseña = $pass;
        }

        public function iniciarSesion($user, $pass){
            if($this->usuario == $user && $this->contraseña == $pass){
                echo "<p>Has accedido al usuario</p>";
            }else{
                echo "<p>Datos incorrectos</p>";
            }
        }

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