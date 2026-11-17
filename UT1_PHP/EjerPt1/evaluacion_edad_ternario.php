<?php
$mensaje = "";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $edad = $_POST["edad"] ?? "";

    if ($edad === "" || !is_numeric($edad) || $edad < 0) {
        $mensaje = '<p style="color: red;">Ingresa una edad válida.</p>';
    } else {
        $edad = (int)$edad;

        // Operador ternario: condición ? valor_si_verdadero : valor_si_falso
        $resultado = ($edad >= 18) ? "Eres mayor de edad" : "Eres menor de edad";

        $mensaje = '<p><strong>' . $resultado . '</strong></p>';
    }
}

echo '<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Evaluación de edad con operador ternario</title>
</head>
<body>
    <h1>Evaluación de edad</h1>

    <form method="post" action="">
        <label for="edad">Edad:</label>
        <input type="number" id="edad" name="edad" min="0" required>
        <br><br>

        <button type="submit">Evaluar</button>
    </form>

    ' . $mensaje . '
</body>
</html>';
?>
