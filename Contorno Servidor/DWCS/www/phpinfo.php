<?php

phpinfo();

    



$valores = [1,5,7,9];

for($i = 0; $i < count($valores);$i++){
    if($i == $_GET['posicion']){
        echo $valores[$i];
    }
}

echo $valores[$_GET['posicion']];