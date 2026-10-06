<?php
    session_start();
    require 'nuevocontacto.php';
    require 'vaciar.php';
    require 'imprimir.php';

    echo "<h2>Agenda de: " . $_SESSION["usuariologin"] . "</h2>";

    if(isset($_POST["enviar"])){
        regContacto();
    }
    if(isset($_POST["vaciar"])){
        vaciarAgenda();
    }

    imprimir();
?>

<div>
    <form method="POST" action="agenda.php">
        <h1>Nuevo contacto</h1>
        <label for="nnombre">Nombre: </label>
        <input type="string" id="nnombre" name="nnombre" >
        <br>
        <label for="nnumero">Teléfono:</label>
        <input type="number" id="nnumero" name="nnumero">
        <br>
        <label for="localidad">Localidad:</label>
        <input type="string" id = "localidad" name = "localidad">
        <button type="submit" id="enviar" name="enviar">Enviar</button>
</div>
<br>
<div>
    <h3>Vaciar agenda</h3>
    <form action="agenda.php" method="POST">
            <button type="submit" id="vaciar" name="vaciar">Vaciar agenda</button>
    </form>
</div>