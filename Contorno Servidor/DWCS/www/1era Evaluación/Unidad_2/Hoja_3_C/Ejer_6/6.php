<?php

$arrayNumeros = array($_GET['numero1'], $_GET['numero2'], $_GET['numero3'], $_GET['numero4'], $_GET['numero5']);

$suma = 0;
$media = 0;

foreach ($arrayNumeros as $numero) {
    $suma = $suma += $numero;
    $media = $suma / count($arrayNumeros);
}


echo "La suma de todos los número es: {$suma}";
echo "<br>";
echo "La media de todos los número es: {$media}";
