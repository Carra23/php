<?php
    session_start();
    if(isset($_POST["registrar"])){
        if(isset($_POST["nombre"]) && $_POST["nombre"] != ""){
            if(isset($_POST["pass"]) && $_POST["pass"] != ""){
                $nombrereg = $_POST["nombre"];
                $_SESSION["usuarios"][$nombrereg] = $_POST["pass"];
                $_SESSION[$nombrereg];
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
                        echo "<h2>Reservas de: " . $user . "</h2>";
                        if(!empty($_SESSION[$user])){
                            foreach($_SESSION[$user] as $nombre => $numero){
                                echo "<p>$nombre | $numero</p>";
                            }
                        }
                        if(isset($_POST["enviar"])){
                            if(isset($_POST["nnombre"]) && $_POST["nnombre"] != ""){
                                if(isset($_POST["nnumero"]) && $_POST["nnumero"] != ""){
                                    $_SESSION[$user][$_POST["nnombre"]] = $_POST["nnumero"];
                                }else{
                                    unset($_SESSION[$user][$_POST["nnombre"]]);
                                }
                            }else{
                                echo "<h2>Nombre vacio</h2>";
                            }
                        }
                    }
                }
                
            }else{
                echo "Contraseña incorrecta";
            }
        }else{
            echo "Usuario no encontrado";
        }
    }
    
?>

<form method="POST" action="index.php">
    <label for="nombre">Introduce usuario:</label>
    <input type="string" id="nombre" name="nombre" >
    <br>
    <label for="pass">Introduce la contraseña:</label>
    <input type="password" id="pass" name="pass">
    <br>
    <button type="submit" id="iniciar" name="iniciar">Iniciar</button>
    <button type="submit" id="registrar" name="registrar">Registrar</button>
    <br>
    <br>
    <div>
        <h1>Nuevo contacto</h1>
        <label for="nnombre">Nombre:</label>
        <input type="string" id="nnombre" name="nnombre" >
        <br>
        <label for="nnumero">Teléfono:</label>
        <input type="number" id="nnumero" name="nnumero">
        <button type="submit" id="enviar" name="enviar">Iniciar</button>
    </div>
</form>