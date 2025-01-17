<?php

if (!isset($_SERVER['PHP_AUTH_USER']) || !isset($_SERVER['PHP_AUTH_PW'])) {
    header('WWW-Authenticate: Basic realm="Zona Restrinxida"');
    header('HTTP/1.0 401 Unauthorized');
    echo 'Acceso denegado.';
    exit;
}

$username = htmlspecialchars($_SERVER['PHP_AUTH_USER']);
$password = htmlspecialchars($_SERVER['PHP_AUTH_PW']);

echo "<h1>Acceso conseguido!</h1>";
echo "<p>Nome de usuario: <strong>$username</strong></p>";
echo "<p>Contrasinal: <strong>$password</strong></p>";
?>
