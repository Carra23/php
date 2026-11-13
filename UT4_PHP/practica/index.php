<html>
    <head></head>
    <body>
        <h1>LOG IN ACADEMIA</h1>
        <form method="post">
            <label for="username">Username</label>
            <input type="text" name="username" id="username">
            <br>
            <label for="userpass">Password</label>
            <input type="password" name="userpass" id="userpass">
            <br>
            <input type="submit" value="Log in" name="login">
        </form>
    </body>
</html>


<?php
    require_once("./clases/validador.php");
    require_once("./BD/conex.php");
    session_start();

    $validador = new validador();

    if(isset($_POST['login'])){
        if(!empty($_POST['username']) && !empty($_POST['userpass'])){
            $username = $_POST['username'];
            $userpass = $_POST['userpass'];

            switch ($validador->validar($username, $userpass)) {
                case 1:
                    echo "Has accedido como profesor";
                    break;

                case 2:
                    echo "Has accedido como administrativo";
                    break;

                case 3:
                    echo "Credenciales incorrectas";
                    break;
                
                default:
                    echo "Credenciales incorrectas";
                    break;
            }

        }
    }
?>