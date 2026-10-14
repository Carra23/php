<?php
require 'Ejer1.php';

if (isset($_POST['enviar'])) {
    if (isset($_POST['alumno']) && $_POST['alumno'] != '') {
        if (isset($_POST['curso']) && $_POST['curso'] != '') {
            $curso = new Curso($_POST['curso']);
            if (isset($_POST['nota']) && $_POST['nota'] != '') {
                $curso->asignarNota($_POST['nota'], $_POST['alumno']);
            } else {
                $curso->inscribir($_POST['alumno']);
            }
            print_r($curso);
        }
    }
}
?>

<form method="POST" action="index.php">
    <label for="curso">Introduce un curso:</label>
    <input type="text" id="curso" name="curso" required>
    <br>
    <label for="alumno">Introduce un nombre:</label>
    <input type="text" id="alumno" name="alumno" required>
    <br>
    <label for="nota">Introduce una nota (vacío para registrar):</label>
    <br>
    <input type="number" id="nota" name="nota">
    <br>
    <button type="submit" id="enviar" name="enviar">Enviar</button>
</form>