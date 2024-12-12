<!DOCTYPE html>
<html lang="gl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestión de Array</title>
</head>
<body>

<h1>Exercicio 1: Engadindo e eliminando elementos no array</h1>

<?php
// Paso 1: Array inicial con dos elementos
$cambio = array("Dolar" => 1.35, "Libra" => 0.87);

// Mostrar el array inicial
echo "<h3>a) Array inicial con 2 elementos:</h3>";
echo "<ul>";
foreach ($cambio as $moeda => $valor) {
    echo "<li>$moeda: $valor</li>";
}
echo "</ul>";
echo "<p>Número de elementos no array: " . count($cambio) . "</p>";

// Paso 2: Añadir la Corona Sueca al array
$cambio["Corona Sueca"] = 9.81;

// Mostrar el array después de añadir un elemento
echo "<h3>b) Engadir 'Corona Sueca' e mostrar o array:</h3>";
echo "<ul>";
foreach ($cambio as $moeda => $valor) {
    echo "<li>$moeda: $valor</li>";
}
echo "</ul>";
echo "<p>Número de elementos no array: " . count($cambio) . "</p>";

// Paso 3: Eliminar la Libra del array
unset($cambio["Libra"]);

// Mostrar el array después de eliminar un elemento
echo "<h3>c) Eliminar 'Libra' e mostrar o array:</h3>";
echo "<ul>";
foreach ($cambio as $moeda => $valor) {
    echo "<li>$moeda: $valor</li>";
}
echo "</ul>";
echo "<p>Número de elementos no array: " . count($cambio) . "</p>";
?>

</body>
</html>
