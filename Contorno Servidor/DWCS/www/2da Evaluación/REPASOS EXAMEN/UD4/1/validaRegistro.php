<?php
include_once 'conexion.php';

function register($pdo, $email, $password, $rol): string
{

    try {
        $query = $pdo->prepare("INSERT INTO `usuarios`(`email`, `contrasinal`, `rol`) VALUES (?,?,?)");
        $query->execute([$email, $password, $rol]);
        return '';

    } catch (PDOException $e) {
        return "Erro no rexistro" . $e->getMessage();
    }
}


if (isset($_POST["btnRegister"])) {
    $email = htmlspecialchars($_POST["txtEmail"]);
    $password = htmlspecialchars(password_hash($_POST["txtPass"], PASSWORD_DEFAULT));
    $rol = 'usuario';

    $mensaxe = register($pdo, $email, $password, $rol);

    if (str_contains($mensaxe, 'Erro')) {
        header("Location:register.php?mensaxe=$mensaxe");
        exit();
    }else {
        header("Location:login.php");
        exit();
    }
}