<?php

if ($_POST['idade'] < 18) {
    echo "Hola, {$_POST['nome']}";
} elseif ($_POST['idade'] < 65) {
    echo "Boas, {$_POST['nome']}";
} else {
    echo "Hi, {$_POST['nome']}";
}

?>