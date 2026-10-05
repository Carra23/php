<?php
$mensaje = "";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $nombre = trim($_POST["nombre"] ?? "");
    $edad = $_POST["edad"] ?? "";

    if ($nombre === "" || $edad === "") {
        $mensaje = '<p style="color: red;">Por favor, completa todos los campos.</p>';
    } elseif (!is_numeric($edad) || $edad < 0) {
        $mensaje = '<p style="color: red;">Ingresa una edad válida.</p>';
    } else {
        $edad = (int)$edad;

        if ($edad < 13) {
            $categoria = "Eres un niño";
        } elseif ($edad <= 17) {
            $categoria = "Eres un adolescente";
        } elseif ($edad <= 64) {
            $categoria = "Eres un adulto";
        } else {
            $categoria = "Eres mayor";
        }

        $mensaje = '<p><strong>Hola, ' . htmlspecialchars($nombre) . '. ' . $categoria . '.</strong></p>';
    }
}

echo '<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Validación de edad y categoría</title>
</head>
<body>
    <h1>Validación de edad</h1>

    <form method="post" action="">
        <label for="nombre">Nombre:</label>
        <input type="text" id="nombre" name="nombre" required>
        <br><br>

        <label for="edad">Edad:</label>
        <input type="number" id="edad" name="edad" min="0" required>
        <br><br>

        <button type="submit">Enviar</button>
    </form>

    ' . $mensaje . '
</body>
</html>';
?>
