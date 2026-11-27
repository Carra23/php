<?php 
/**
     * Crea una clase ModeloUsuario que tenga 3 métodos: 
     * - getUsuarioId($id):array  para obtener un usuario a partir de su id
     * - getUsuarios():array para obtener un array de todos los usuarios
     * - insertUsuario($username, $userpass):bool para introducir un usuario en la bd
     */

define('DB_HOST',"localhost");
const DB_USUARIO = "root";
const DB_CONTRA = "";
const DB_DB = "biblioteca";