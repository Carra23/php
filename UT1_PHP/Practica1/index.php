<h2>Inicio de sesión</h2>
<form method="POST" action="index.php">
    <label for="nombre">Introduce usuario:</label>
    <input type="string" id="nombre" name="nombre" >
    <br>
    <label for="pass">Introduce la contraseña:</label>
    <input type="password" id="pass" name="pass">
    <br>
    <button type="submit" id="iniciar" name="iniciar">Iniciar</button>
    <button type="submit" id="registrar" name="registrar">Registrar</button>
</form>

<?php
    session_start();
    if(isset($_POST["registrar"])){
        if(isset($_POST["nombre"]) && $_POST["nombre"] != ""){
            if(!isset($_SESSION["usuarios"][$_POST["nombre"]])){
                if(isset($_POST["pass"]) && $_POST["pass"] != ""){
                    $nombrereg = $_POST["nombre"];
                    $_SESSION["usuarios"][$nombrereg] = $_POST["pass"];
                    $_SESSION[$nombrereg] = [];
                }
            }else{
                echo "Usuario ya registrado";
            }
        }
    }

    if(isset($_POST["iniciar"])){
        if(isset($_POST["nombre"]) && $_POST["nombre"] != ""){
            if(isset($_POST["pass"]) && $_POST["pass"] != ""){
                $user = $_POST["nombre"];
                $pass = $_POST["pass"];

                if(isset($_SESSION["usuarios"][$user])){
                    if($_SESSION["usuarios"][$user] == $pass){
                        $_SESSION["usuariologin"] = $user;
                        header("Location: agenda.php?vaciar=1");
                    }else{
                        echo "Contraseña incorrecta";
                    }
                }else{
                    echo "Usuario no encontrado";
                }
            }
        }
    }  
    exit;
?>

