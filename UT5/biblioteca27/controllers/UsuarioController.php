<?php
    require_once 'models/UsuarioModel.php';
    class UsuarioController{
        private UsuarioModel $usuarioModel;

        public function __construct(){
            $this->usuarioModel = new UsuarioModel();
        }

        public function listarUsuarios(){
            $usuarios = $this->usuarioModel->getUsuarios();
            require 'views/UsuarioView.php';
        }

        /*public function listarUsuarioID(){
            $usuarios = $this->usuarioModel->getUsuarioID($id);
            require 'views/UsuarioView.php';
        }*/
    }
?>