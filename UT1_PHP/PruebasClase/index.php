<!DOCTYPE html>
<?php

include 'imprimir.php';

$a = 10;
function asignacion(){
    global $a;    
    $b = $a + 100;
    echo $b;
}

function incremento(){
    static $contador = 0;
    $contador++;
    return $contador;
}
?>

    <html>
        <head>
            <title>
            </title>
        </head>
        <body>
            <h1>Hola</h1>
            <?php
                echo "<p>el contador es: ". incremento()."</p>";
                echo "<h1>" . imprimir() . "</h1>";
            ?>
        </body>
    </html>