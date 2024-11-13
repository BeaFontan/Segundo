<?php

$puntuacion = array("Ana"=>123, "Belén"=>14,"Felipe"=>3,"Moncho"=>245,"Artur"=>10);


sort($puntuacion); //mostra so os valores

foreach ($puntuacion as $nome => $puntos) {
    echo "<p>$nome </p> <p> $puntos</p>";
}

//////////////////////////////////////////////////////////////////////////////////////
$puntuacion = array("Ana"=>123, "Belén"=>14,"Felipe"=>3,"Moncho"=>245,"Artur"=>10);

asort($puntuacion); //mostra valores e claves

foreach ($puntuacion as $nome => $puntos) {
    echo "<p>$nome </p> <p> $puntos</p>";
}



?>