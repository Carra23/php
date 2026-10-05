<?php
    $ciudades = ["Madrid", "Barcelona", "Valencia", "Sevilla", "Bilbao"];

    unset($ciudades[1]);
    array_push($ciudades, "Malaga");

    foreach($ciudades as $ciudad){
        echo "$ciudad <br>";
    }
?>