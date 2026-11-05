<html>
    <head></head>
    <body>
        <h1>Sign in</h1>
        <form method="post">
            <label for="username">Tabla</label>
            <input type="text" name="username" id="username">
            <br>
            <input type="submit" value="Sign in" name="signin">
        </form>
    </body>
</html>

<?php
    session_start();

    if(isset($_POST['signin'])){
        if(!empty($_POST['username'])){
            $username = $_POST['username'];

            $conexion = mysqli_connect('localhost', 'root', '', 'playstation');

            $sql = "SELECT * FROM $username";
            $stmt = mysqli_prepare($conexion, $sql);
            //mysqli_stmt_bind_param($stmt, "s", $username);

            mysqli_stmt_execute($stmt);
            $result = mysqli_stmt_get_result($stmt);

            echo "<table>";
            while($usuario = mysqli_fetch_assoc($result)){
                echo "<tr>
                <td>$usuario[userid]</td>
                <td>$usuario[username]</td>
                <td>$usuario[userpass]</td>
                </tr>";
            }

            echo "</table>";

            /*if($result){
                header("Location: index.php");
                exit();
            }else{
                echo "Se ha producido un error al insertar";
            }*/
        }
    }
?>
