<html>
    <head></head>
    <body>
        <h1>Sign in</h1>
        <form method="post">
            <label for="username">Username</label>
            <input type="text" name="username" id="username">
            <br>
            <label for="userpass">Password</label>
            <input type="password" name="userpass" id="userpass">
            <br>
            <input type="submit" value="Sign in" name="signin">
        </form>
    </body>
</html>

<?php
    session_start();

    if(isset($_POST['signin'])){
        if(!empty($_POST['username']) && !empty($_POST['userpass'])){
            $username = $_POST['username'];
            $userpass = $_POST['userpass'];

            $host = "localhost";
            $user = "root";
            $password = "";
            $db = "playstation";
            $conexion = mysqli_connect($host, $user, $password, $db);

            $sql = "INSERT INTO `usuario`(`userid`, `username`, `userpass`) VALUES (NULL, '$username', '$userpass')";
            $result = mysqli_query($conexion, $sql);

            if($result){
                echo "Se ha registrado con exito";
                $id = mysqli_query($conexion, "SELECT `userid` FROM `usuario` WHERE `username` = '$username'");
                $_SESSION['id'] =  mysqli_fetch_asso($id);
                header("Location: index.php");
                exit();
            }else{
                echo "Se ha producido un error al insertar";
            }

            mysqli_close($conexion);
        }
    }
?>
