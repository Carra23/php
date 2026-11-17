<?php
    $arr1 = [8, 12,16,22,30];

    print_r($arr1);

    if(isset($_POST['enviar'])){
        if(isset($_POST['numero']) and $_POST['numero'] != ''){
            $num = $_POST['numero'];
            $arr1[] = $num;
        }
        if(isset($_POST['indice']) and $_POST['indice'] != ''){
            if(isset($_POST['num2']) and $_POST['num2'] != ''){
                $num = $_POST['numero'];
                $i = $_POST['indice'];

                $arr1[$i] = $num;
            }
        }
    }

    print("<br>");
    print_r($arr1);
?>

<form method="POST" action="añadir_modificar_elemento.php">
    <label for="numero">Introduce un número:</label>
    <input type="number" id="numero" name="numero" required>
    <br>
    <br>
    <label for="numero">Introduce un indice a modificar:</label>
    <input type="number" id="indice" name="indice">
    <label for="num2">Valor modificado:</label>
    <input type="number" id="num2" name="num2" >
    <button type="submit" id="enviar" name="enviar">Enviar</button>
</form>

