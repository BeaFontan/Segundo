<?php

function menorAmaior($a, $b)
{
    return strcmp($b, $a);//para el orden inverso invierto las claves
}

$datos = array('f' => 4, 'g' => 8, 'a' => -1, 'b' => -10);

uksort($datos, 'menorAmaior');

foreach ($datos as $key => $dato) {
    echo "{$key} -> {$dato} </br>";
}
?>
