<?php
    $arr1 = [
        'Lunes' => '8:30 - 14:30',
        'Martes' => '8:30 - 14:30',
        'Miercoles' => '8:30 - 14:30',
        'Jueves' => '8:30 - 14:30',
        'Viernes' => '8:30 - 14:30',
        'Sabado' => '8:30 - 14:30',
        'Domingo' => '8:30 - 14:30',
    ];

    foreach($arr1 as $dia =>$horario){
        echo "$dia: $horario <br>";
    }

    if(isset($_POST['enviar'])){
        if(isset($_POST['dia']) and $_POST['dia'] != ''){
            if(isset($_POST['horario']) and $_POST['horario'] != ''){
                $ndia = $_POST['dia'];
                $nhorario = $_POST['horario'];
                
                if(isset($arr1[$ndia])){
                    $arr1[$ndia] = $nhorario;
                }  
            }
        }
        echo "<BR>NUEVO HORARIO<BR>";
        foreach($arr1 as $dia =>$horario){
            echo "$dia: $horario <br>";
        }
    }

    

?>

<form method="POST" action="gestion_horarios.php">
    <label for="dia">Introduce un día:</label>
    <input type="string" id="dia" name="dia" required>
    <br>
    <label for="horario">Introduce el horario:</label>
    <input type="string" id="horario" name="horario">
    <button type="submit" id="enviar" name="enviar">Enviar</button>
</form>