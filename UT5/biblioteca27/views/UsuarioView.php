<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listar Usuarios</title>
</head>
<body>
    <h1>Usuarios</h1>
    <table border="1">
        <thead>
            <tr>
                <th>ID Usuario</th>
                <th>Nombre</th>
                <th>Email</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($usuarios as $usuario): ?>
                <tr>
                    <td><?php echo $usuario['id_usuario']; ?></td>
                    <td><?php echo $usuario['nombre']; ?></td>
                    <td><?php echo $usuario['email']; ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <a href="index.php" class="boton">Volver al menú</a>
</body>
</html>
