<?php
ob_start();
require_once '../vista/vistaUsuario.php';
require_once '../modelo/UsuarioModelo.php';

formUsuario();

if (isset($_POST["btnLogin"])) {

    $usuario = strtolower($_POST["txtUsuario"]);
    $pass = htmlspecialchars($_POST["txtPass"]);
    
    $user = new UsuarioModelo($usuario, $pass);

    $mensaxe = $user->isUsuarioValido();

    mostrarMensaxe($mensaxe);
}

ob_end_flush();
