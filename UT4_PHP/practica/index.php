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
    require_once("./clases/ModeloProfe.php");
    require_once("./clases/UserProfe.php");
    session_start();

    $validador = new validador();

    if(isset($_POST['login'])){
        if(!empty($_POST['username']) && !empty($_POST['userpass'])){
            $username = $_POST['username'];
            $userpass = $_POST['userpass'];

            switch ($validador->validar($username, $userpass)) {
                case "profesor":
                    $modprofesor = new ModeloProfe();
                    $profesor = new UserProfe(
                        $modprofesor->getDatos($username)['id_profesor'],
                        $modprofesor->getDatos($username)['nombre'],
                        $modprofesor->getDatos($username)['apellidos'],
                        $modprofesor->getDatos($username)['user'],
                        $modprofesor->getDatos($username)['password'],
                    );
                    $_SESSION['usuario'] = $profesor;
                    header("Location: profesor.php");
                    break;

                case "admin":
                    $_SESSION['username'] = $username;
                    header("Location: admin.php");
                    break;

                case "error":
                    echo "Credenciales incorrectas";
                    break;
                
                default:
                    echo "Credenciales incorrectas";
                    break;
            }

        }
    }
?>