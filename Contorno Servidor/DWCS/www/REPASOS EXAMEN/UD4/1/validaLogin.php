<?php
session_start();
include_once "conexion.php";

function comprobarEmail($pdo, $email): mixed
{
    try {
        $query = $pdo->prepare("SELECT * FROM `usuarios` WHERE email like ?");
        $query->execute([$email]);
        $usuario = $query->fetch();
        return $usuario ?: "Non existe o email";

    } catch (PDOException $e) {
        return "Erro na busqueda de email" . $e->getMessage();
    }
}

function actualizarConexion($pdo, $usuario): string
{
    $ultimaConex = date("Y-m-d H:i:s");

    try {
        $query = $pdo->prepare("UPDATE `usuarios` SET `ultima_conexion`= ? WHERE id = ?");
        $query->execute([$ultimaConex, $usuario]);
        return '';
    
    } catch (PDOException $e) {
        return "Erro actualizando última conexión" . $e->getMessage();
    }  
}


if (isset($_POST["btnLogin"])) {
    $email = htmlspecialchars($_POST["txtEmail"]);
    $password = htmlspecialchars($_POST["txtPass"]);
    $idioma = $_POST["selectIdioma"] ?? "castellano";

    $usuario = comprobarEmail($pdo, $email);

    if (is_string($usuario) == false) {
        
        $contrasinalCorrecto = password_verify($password, $usuario["contrasinal"]);

        if ($contrasinalCorrecto) {

            $mensaxe = actualizarConexion($pdo,$usuario["id"]);

            session_regenerate_id(true);

            setcookie("idioma_usuario", $idioma, time() + 604800);

            $datos = [
                "id" => $usuario["id"],
                "email" => $usuario["email"],
            ];

            $_SESSION["datos"] = $datos;

            header("location:mostra.php");
            exit();

        } else {
            $mensaxe = "Contrasinal incorrecto";
            header("location:login.php?mensaxe=$mensaxe");
            exit;
        }

    }else {
        $mensaxe = $usuario;
        header("Location:login.php?mensaxe=$mensaxe");
        exit();
    }
    
}