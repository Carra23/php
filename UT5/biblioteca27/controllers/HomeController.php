<?php
    class HomeController{

        public function __construct(){}

        public function mostrarHome(){
            require 'views/HomeView.php';
        }
    }
?>