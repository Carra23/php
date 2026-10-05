<?php
    $personas = ["Ana", "Carlos", "Beatriz", "David", "Elena", "Fernando"];

    $per1 = "David";
    $per2 = "Ana";
    
    if(in_array($per1, $personas) && in_array($per2, $personas)){
        unset($personas[array_search($per1, $personas)]);
        unset($personas[array_search($per2, $personas)]);
    }

    foreach($personas as $per){
        echo "$per <br>";
    }
?>