<?php
    class UserProfe{
        
        public function __construct(
            protected $id,  
            protected $nombre,  
            protected $apellidos,
            protected $username,
            protected $userpass,
        )
        {}

        public function getUsername()
        {
            return $this->username;
        }

        public function setUsername($username)
        {
            $this->username = $username;
        }

        public function getUserpass()
        {
            return $this->userpass;
        }

        public function setUserpass($userpass)
        {
            $this->userpass = $userpass;
        }

        public function getId()
        {
            return $this->id;
        }

        public function setId($id)
        {
            $this->id = $id;
        }

        public function getNombre()
        {
            return $this->nombre;
        }

        public function setNombre($nombre)
        {
            $this->nombre = $nombre;
        }

        public function getApellidos()
        {
            return $this->apellidos;
        }

        public function setApellidos($apellidos)
        {
            $this->apellidos = $apellidos;
        }
    }
?>