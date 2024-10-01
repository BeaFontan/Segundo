<?php

if (!is_numeric($_GET['numero1']) || !is_numeric($_GET['numero2'])) {
    echo "<p>Error: Os valores introducidos deben ser números.</p>";
} else {

    $numero1 = (int) $_GET['numero1'];
    $numero2 = (int) $_GET['numero2'];

    if (strcmp($_GET['operacion'], 'suma') == 0) {
        $suma = $numero1 + $numero2;
        echo "<p>A suma sería: {$numero1} + {$numero2} = {$suma}</p>";

    } elseif (strcmp($_GET['operacion'], 'resta') == 0) {
        $resta = $numero1 - $numero2;
        echo "<p>A resta sería: {$numero1} - {$numero2} = {$resta}</p>";

    } elseif (strcmp($_GET['operacion'], 'multiplicacion') == 0) {
        $multiplicacion = $numero1 * $numero2;
        echo "<p>A multiplicación sería: {$numero1} * {$numero2} = {$multiplicacion}</p>";
    }
}

