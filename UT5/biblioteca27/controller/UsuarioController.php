<?php
    require_once('../models/UsuarioModel.php');

    class UsuarioController{
        private UsuarioModel $usuarioModel;

        public function __construct()
        {
            $this->usuarioModel = new UsuarioModel();
        }

        public function listarUsuarios(){
            $usuarios = $this->usuarioModel->listarUsuarios();
            require ('../views/UsuarioView.php');
        }
    }
?>