<?php

function menorAmaior($array)
{
    ksort($array);

    return $array;
}

$datos=array('f'=>4, 'g'=>8, 'a'=>-1, 'b'=>-10);

$nuevoArray = menorAmaior($datos);

foreach ($nuevoArray as $key=>$dato) {
    echo "{$key} ->";
    echo "{$dato} </br>";
}


?>