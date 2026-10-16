<?php
    require('Coche.php');
    require('Camion.php');
    require('Bicicleta.php');

    $coche = new Coche(220);

    echo "<h1>COCHE</h1>";
    $coche->getVelocidadMax();
    $coche->arrancar();
    $coche->parar();
    echo "<br>";

    echo "<h1>CAMION</h1>";
    $camion = new Camion(180);
    $camion->getVelocidadMax();
    $camion->cargarMercancia(200);
    $camion->arrancar();
    $camion->parar();
    echo "<br>";

    echo "<h1>BICICLETA</h1>";
    $bici = new Bicicleta(50);
    $bici->getVelocidadMax();
    $bici->arrancar();
    $bici->pedalear();
    $bici->parar();


?>