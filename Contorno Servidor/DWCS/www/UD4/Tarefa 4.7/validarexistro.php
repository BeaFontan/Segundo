<?php

include_once("conexion.php");

function comprobarEmailExistente($pdo, $email)
{
    try {
        $query = $pdo->prepare("Select email from usuarios where email like ?");
        $query->execute([$email]);
        return $query->fetch();
     
    } catch (PDOException $e) {
        return "Erro buscando email existente" . $e->getMessage();
    }
}

function insertarUsuario($pdo, $email, $contrasinal, $rol, $nome, $apelido1, $apelido2)
{
    try {
        $query = $pdo->prepare("INSERT INTO `usuarios`(`email`, `contrasinal`, `rol`, `nome`, `apelido1`, `apelido2`) VALUES (?,?,?,?,?,?)");
        $query->execute([$email, $contrasinal, $rol, $nome, $apelido1, $apelido2]);
        return "Usuario registrado correctamente";

    } catch (PDOException $e) {
        return "Erro no rexistro" . $e->getMessage();
    }
}


if (isset($_POST["btnEnviarRexistro"])) {
    $nome = htmlspecialchars($_POST["txtNomeRexistro"]);
    $apelido1 = htmlspecialchars($_POST["txtApelido1Rexistro"]);
    $apelido2 = htmlspecialchars($_POST["txtApelido2Rexistro"]);
    $email = htmlspecialchars($_POST["txtEmailRexistro"]);
    $contrasinal = htmlspecialchars(password_hash($_POST["txtContrasinalRexistro"], PASSWORD_DEFAULT));
    $rol = "usuario";

    $emailExistente = comprobarEmailExistente($pdo, $email);

    if (!empty($emailExistente)) {
        $mensaxe = "O email xa está rexistrado";
        header("location:rexistro.php?mensaxe=$mensaxe");
        exit;

    } else {
        $mensaxe = insertarUsuario($pdo, $email, $contrasinal, $rol, $nome, $apelido1, $apelido2);

        if (str_contains($mensaxe, 'Erro')) {
            header("location:rexistro.html?mensaxe=$mensaxe");
            exit;
        } else {
            header("location:login.php");
            exit;
        }
    }
} else {
    header("location:login.php");
    exit;
}


