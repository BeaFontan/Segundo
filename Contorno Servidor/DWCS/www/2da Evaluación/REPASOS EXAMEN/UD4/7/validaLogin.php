<?php
session_start();

require_once "conexion.php";

function login($pdo, $email): mixed
{
    try {
        $query = $pdo->prepare("select * from usuarios where Email like ?");
        $query->execute([$email]);
        $usuario = $query->fetch();
        return $usuario ?: "Non existe o email";

    } catch (PDOException $e) {
        return "Erro no login " . $e->getMessage();
    }
}

function actualizarData($pdo, $fecha, $id): string
{
    try {
        $query = $pdo->prepare("UPDATE `usuarios` SET ultima_conexion=? WHERE id like ?");
        $query->execute([$fecha, $id]);
        return "";

    } catch (PDOException $e) {
        return "Erro actualzando data " . $e->getMessage();
    }
}


if (isset($_POST["btnLogin"])) {
    $email = htmlspecialchars($_POST["txtEmail"]);
    $pass = htmlspecialchars($_POST["txtPass"]);
    $idioma = $_POST["SelectIdioma"];
    $fecha = date("Y-m-d H:i:s");

    $usuario = login($pdo, $email);

    if (is_string($usuario)) {
        header("Location:login.php?mensaxe=$usuario");
        exit;

    } else {
        $passCorrecto = password_verify($pass, $usuario["contrasinal"]);

        if (!$passCorrecto) {
            $mensaxe = "contrasinal erróneo";
            header("Location:login.php?mensaxe=$mensaxe");
            exit;

        }else {

            $mensaxe = actualizarData($pdo, $fecha, $usuario["id"]);

            if (str_contains($mensaxe, "Erro")) {
                header("Location:login.php?mensaxe=$mensaxe");
                exit;

            } else {
                session_regenerate_id(true);

                setcookie("idioma_usuario", $idioma, time() + 1000000);

                $datos = [
                    "id" => $usuario["id"],
                    "email" => $usuario["email"]
                ];

                $_SESSION["datos"] = $datos;

                header("Location:mostra.php");
                exit;
            }
        }
    }
}