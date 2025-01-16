<?php
if (!isset($_SERVER['PHP_AUTH_USER'])) {
    header('WWW-Authenticate: Basic realm="Acceso restrinxido"');
    header('HTTP/1.0 401 Unauthorized');
    echo 'Requerida autenticación para acceder a esta páxina.';
    exit;
}else {
    echo "<p>Introduciches como nome de usuario: {$_SERVER['PHP_AUTH_USER']}.</p>";
    echo "<p>Introduciches como contrasinal: {$_SERVER['PHP_AUTH_PW']}</p>";
}