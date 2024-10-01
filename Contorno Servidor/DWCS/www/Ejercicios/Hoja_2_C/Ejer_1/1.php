<?php

$usuarios = ["Manuel", "Encarna", "Pedro", "Alejandro"];

$contrasinal = ["Manuel1", "Encarna1", "Pedro1", "Alejandro1"];

$usuarioPeticion = $_POST['usuario'];
$contrasinalPeticion = $_POST['contrasinal'];

$usuarioCorrecto = false;
$contrasinalCorrecta = false;

for ($i=0; $i <= 4; $i++) { 
    if (strcmp($usuarioPeticion, $usuarios[$i]) == 0 && strcmp($contrasinalPeticion, $contrasinal[$i] == 0)) {
        $usuarioCorrecto = true;
        $contrasinalCorrecta = true;
    }
}

if ($usuarioCorrecto == true && $contrasinalCorrecta) {
    echo "<p>" ."Acceso Permitido" ."</p>";
} else {
    echo "<p>" ."Acceso non Permitido" ."</p>";
}

?>