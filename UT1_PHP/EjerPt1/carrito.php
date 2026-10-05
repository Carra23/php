<form method="POST" action="carrito.php">
    <label for="producto">Introduce un producto:</label>
    <input type="string" id="producto" name="producto" >
    <br>
    <label for="precio">Introduce el precio:</label>
    <input type="number" id="precio" name="precio">
    <br>
    <button type="submit" id="enviar" name="enviar">Enviar</button>
    <button type="submit" id="restablecer" name = "restablecer">Restablecer</button>
</form>

<?php
    session_start();
    if(isset($_POST["enviar"])){
        if(isset($_POST["producto"]) && $_POST["producto"] != ""){
            if(isset($_POST["precio"]) && $_POST["precio"] != "" && $_POST["precio"] > 0){
                $prod = $_POST["producto"];
                $prec = $_POST["precio"];
                $ncarro[$prod] = $prec;

                if(isset($_SESSION["carrito"])){
                    $_SESSION["carrito"][] = $ncarro;
                }else{
                    $_SESSION["carrito"] = $ncarro;
                }
            }
        }

        foreach($_SESSION["carrito"] as $item){
            echo "Producto: $item - precio: " .  $item['precio'];
        }
    }
    if(isset($_POST["restablecer"])){
        session_destroy();   
    }
?>