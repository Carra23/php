<form method="POST" action="reservas_restaurante.php">
    <label for="nombre">Introduce un nombre:</label>
    <input type="string" id="nombre" name="nombre" >
    <br>
    <label for="personas">Introduce las personas:</label>
    <input type="number" id="personas" name="personas">
    <br>
    <button type="submit" id="enviar" name="enviar">Enviar</button>
    <button type="submit" id="restablecer" name = "restablecer">Restablecer</button>
    <button type="submit" id="eliminar" name = "eliminar">Eliminar</button>
</form>

<?php
    session_start();

    function realizarReserva(){
        if(isset($_POST["nombre"]) && $_POST["nombre"] != ""){
            if(isset($_POST["personas"]) && $_POST["personas"] != "" && $_POST["personas"] > 0){
                $nombre = $_POST["nombre"];
                $personas = $_POST["personas"];
                    
                if(isset($_SESSION["reservas"])){
                    $_SESSION["reservas"][$nombre] = $personas;
                }else{
                    $_SESSION["reservas"] = [];
                    $_SESSION["reservas"][$nombre] = $personas;
                }
            }
        }
    }

    function eliminarReserva(){
        if(!empty($_SESSION["reservas"])){
            unset($_SESSION["reservas"][array_key_first($_SESSION["reservas"])]);
        }
    }

    function resetearReservas(){
        session_destroy();  
    }
    

    if(isset($_POST["enviar"])){
        realizarReserva();
    }elseif(isset($_POST["eliminar"])){
        eliminarReserva();
    }elseif(isset($_POST["restablecer"])){
        resetearReservas();
    }

    
    $totalper = 0;
    
    echo "<h2>Reservas realizadas</h2>";

    if(!empty($_SESSION["reservas"])){
        foreach($_SESSION["reservas"] as $item => $valor){
            echo "Nombre: " . $item . " | Personas: " . $valor . "<br>";
            $totalper += $valor;
        }
        echo "Total personas: $totalper";
    }    
?>