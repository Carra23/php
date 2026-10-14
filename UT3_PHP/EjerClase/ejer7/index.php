<?php
    require 'inventario.php';
    session_start();

    if(!isset($_SESSION["almacen"])){
        $almacen = new Inventario;
        $_SESSION['almacen'] = $almacen;
    }else{
        $almacen = $_SESSION["almacen"];
    }
    


    if(isset($_POST["añadir"])){
        if(isset($_POST['producto']) && $_POST['producto'] != ''){
            $almacen->añadir($_POST['producto']);
        }
    }

    if(isset($_POST["eliminar"])){
        if(isset($_POST['producto']) && $_POST['producto'] != ''){
            $almacen->eliminar($_POST['producto']);
        }
    }

    if(isset($_POST["establecer"])){
        if(isset($_POST['producto']) && $_POST['producto'] != ''){
            if(isset($_POST['cantidad']) && $_POST['cantidad'] != '')
                $almacen->setCantidad($_POST['producto'], $_POST['cantidad']);
        }
    }

    if(isset($_POST['imprimir'])){
        $almacen->imprimir();
    }
?>

<form method="POST" action="index.php">
    <label for="producto">Introduce un producto:</label>
    <input type="text" id="producto" name="producto">
    <br>
    <label for="nota">Introduce una cantidad:</label>
    <br>
    <input type="number" id="cantidad" name="cantidad">
    <br>
    <button type="submit" id="añadir" name="añadir">Añadir producto</button>
    <button type="submit" id="eliminar" name="eliminar">Eliminar producto</button>
    <button type="submit" id="establecer" name="establecer">Establecer cantidad</button>
    <button type="submit" id="imprimir" name="imprimir">Imprimir</button>
</form>