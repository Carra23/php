<?php
    $numeros = range(1, 15);

    foreach($numeros as $num){
        if(($num % 2) == 0){
            echo "$num es par <br>";
        }else{
            echo "$num es impar <br>";
        }
    }

?>