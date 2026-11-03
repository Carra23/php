<?php
    $host = "localhost";
    $user = "root";
    $password = "";
    $db = "prueba";

    $conexion = mysqli_connect($host, $user, $password, $db);

    if(!$conexion){
        die("Conexion fallida" . mysqli_connect_error());
    }

    $sql = "SELECT * FROM USUARIOS";

    $result = mysqli_query($conexion, $sql);

    var_dump($result);

    echo "<br>";

    $fila = mysqli_fetch_assoc($result);

    var_dump($fila);
?>