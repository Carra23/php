<?php

    require_once('Libro.php');

    $libro = new App\Libro("El Quijote", "Cervantes");

    echo $libro->toString() . "<br>";
?>