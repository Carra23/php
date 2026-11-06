<?php
    require_once("modeloUsuario.php");

    if(isset($_POST['signin'])){
        if(!empty($_POST['username'])){
            $username = $_POST['username'];
            $userpass = $_POST['userpass'];
            $id = $_POST['id'];

            $conexion = new modeloUsuario();

            var_dump($conexion->getUserID($id));
            echo "<br>";
            var_dump($conexion->getUsers());
            echo "<br>";
            echo $conexion->insertUser($username, $userpass);
        }
    }

?>

<html>
    <head></head>
    <body>
        <h1>Sign in</h1>
        <form method="post">
            <label for="username">User</label>
            <input type="text" name="username" id="username">
            <br>
            <label for="userpass">Password</label>
            <input type="password" name="userpass" id="userpass">
            <br>
            <label for="id">ID</label>
            <input type="number" name="id" id="id">
            <br>
            <input type="submit" value="Sign in" name="signin">
        </form>
    </body>
</html>