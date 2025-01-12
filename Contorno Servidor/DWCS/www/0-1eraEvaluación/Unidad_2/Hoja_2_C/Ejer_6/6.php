<?php


if (!is_numeric($_POST['numero1']) || !is_numeric($_POST['numero2']) || !is_numeric($_POST['numero3'])) {

    echo "<p>Error: Os valores introducidos deben ser números.</p>";

} else {

    $numero1 = (int) $_POST['numero1'];
    $numero2 = (int) $_POST['numero2'];
    $numero3 = (int) $_POST['numero3'];

    $maior = max($numero1, $numero2, $numero3);
    $menor = min($numero1, $numero2, $numero3);


    echo "O número maior é {$maior} e número menor é: {$menor}";
}