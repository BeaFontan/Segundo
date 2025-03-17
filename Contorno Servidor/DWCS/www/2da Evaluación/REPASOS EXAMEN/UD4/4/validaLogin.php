<?php
session_start();

require_once "conexion.php";

function login($pdo, $email): mixed
{
    try {
        $query = $pdo->prepare("SELECT * FROM `usuarios` WHERE email like ?");
        $query->execute([$email]);
        $user = $query->fetch();
        return $user ?: "No existe el usuario";

    } catch (PDOException $e) {
        return "Erro buscando email" . $e->getMessage();
    }
}

function actualizarFecha($pdo, $email, $fecha): string
{
    try {
        $query = $pdo->prepare("UPDATE `usuarios` SET `ultima_conexion`=? WHERE email like ?");
        $query->execute([$fecha, $email]);
        return "";

    } catch (PDOException $e) {
        return "Erro buscando email" . $e->getMessage();
    }
}

if (isset($_POST["btnLogin"])) {
   $email = htmlspecialchars($_POST["txtEmail"]);
   $pass = htmlspecialchars($_POST["txtPass"]);
   $fecha = date("Y-m-d H:i:s");
   $idioma = $_POST["SelectIdioma"];

    $usuario = login($pdo, $email);

    if (is_string($usuario)) {
        header("Location:login.php?mensaxe=$usuario");
        exit();
    }else {
        $contrasinalCorrecto = password_verify($pass, $usuario["contrasinal"]);

        if (!$contrasinalCorrecto) {
            $mensaxe = "Contrasinal incorrecto";
            header("Location:login.php?mensaxe=$mensaxe");
            exit();

        }else{
            $mensaxe = actualizarFecha($pdo, $email, $fecha);

            if (str_contains($mensaxe, "Erro")) {
                header("Location:login.php?mensaxe=$mensaxe");
                exit();

            }else{
                session_regenerate_id(true);

                setcookie("idioma_usuario", $idioma, time() + 1000000);

                $datos = [
                    "id" => $usuario["id"],
                    "email" => $usuario["email"]
                ];

                $_SESSION["datos"] = $datos;

                header("Location:mostra.php");
                exit();
            }
        }
    }

}