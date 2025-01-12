<?php

$arrayNumeros = array($_GET['numero1'], $_GET['numero2'], $_GET['numero3'], $_GET['numero4'], $_GET['numero5']);

for ($i = 0; $i < count($arrayNumeros); $i++) {
    echo "{$arrayNumeros[$i]} ,";
}

//Suma
$suma = array_sum($arrayNumeros);
echo "La suma de todos los número es:  {$suma}";
echo "<br>";

//Multiplicación
$multiplicacion = 1;

for ($i = 1; $i < count($arrayNumeros); $i++) {
    $multiplicacion *= $arrayNumeros[$i];
}

echo "El producto es: {$multiplicacion}";

//Máximo y mínimo
$max = max($arrayNumeros);
$min = min($arrayNumeros);

echo "<br>";
echo "El número mayor es: {$max} y el número menor es: {$min}";
