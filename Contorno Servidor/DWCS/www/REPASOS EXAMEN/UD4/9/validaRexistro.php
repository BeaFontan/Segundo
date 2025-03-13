<?php
require_once "conexion.php";

function rexistro($pdo, $email, $pass, $rol): string
{
    try {
        $query = $pdo->prepare("INSERT INTO `usuarios`(`email`, `contrasinal`, `rol`) VALUES (?,?,?)");
        $query->execute([$email, $pass, $rol]);
        return "";

    } catch (PDOException $e) {
        return "Erro no rexistro " . $e->getMessage();
    }

}


if (isset($_POST["btnRexistro"])) {
    $email = htmlspecialchars($_POST["txtEmail"]);
    $pass = htmlspecialchars(password_hash($_POST["txtPass"], PASSWORD_DEFAULT));
    $rol = 'usuario';

    $mensaxe = rexistro($pdo, $email, $pass, $rol);

    if (str_contains($mensaxe, "Erro")) {
        header("Location:rexistro.php?mensaxe=$mensaxe");
        exit;
    } else {
        header("Location:login.php");
        exit;
    }
}