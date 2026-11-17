
<!DOCTYPE html>
<html>
    <body>
        <form action="iguales.php" method="post">
            <label for="nota">Nota: </label>
            <input type="number" id="nota" name="nota">
            <br>
            <label for="veces">Veces: </label>
            <input type="number" id="veces" name="veces">
            <br>
            <input type="submit" name="enviar" id="enviar">
        </form>
    </body>
</html>
<?php
    if(isset($_POST['enviar'])){
        if(isset($_POST['nota']) && $_POST['nota'] !== ''){
            $nota = (int) $_POST['nota'];

            $resultado = match (true) {
            $nota < 5 => 'Insuficiente',
            $nota < 6 => 'Suficiente',  
            $nota < 7 => 'Bien',
            $nota < 9 => 'Notable',
            $nota < 10 => 'Sobresaliente',
            $nota == 10 => 'Matricula de honor',
            default => 'Nota invalida',
        };
            if(isset($_POST['veces']) && $_POST['veces'] !== ''){
                $veces = (int) $_POST['veces'];
                for($i=0;$i<$veces;$i++){
                    echo $resultado . '<br>';
                }
            }      
        }else{
            echo 'Añada la nota por favor';
        }
        
        
    }
?>