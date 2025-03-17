<?php
session_start();

require_once "conexion.php";

function buscarMail($pdo, $email): mixed
{
    try {
        $query = $pdo->prepare("Select * from usuarios where email like ?");
        $query->execute([$email]);
        $usuario = $query->fetch();
        return $usuario ?: "Non existe o email";

    } catch (PDOException $e) {
        return "Erro na búscqueda de usuario " .$e->getMessage(); 
    }
}

function actualizarUltimaConexion($pdo, $user): string
{
    $data = date("Y-m-d H:i:s");

    try {
        $query = $pdo->prepare("UPDATE `usuarios` SET `ultima_conexion`= ? WHERE id like ?");
        $query->execute([$data, $user]);
        return '';
    } catch (PDOException $e) {
        return "Erro actilizando a data de última conexión " .$e->getMessage(); 
    }

}



if (isset($_POST["btnLogin"])) {
    $email = htmlspecialchars($_POST["txtEmail"]);
    $pass = htmlspecialchars($_POST["txtPass"]);
    $idioma = $_POST["SelectIdioma"];

    $usuario = buscarMail($pdo, $email);

    if (is_string($usuario)) {
        header("Location:login.php?mensaxe=$usuario");
        exit;

    }else {
        $passCorrecto = password_verify($pass, $usuario["contrasinal"]);

        if (!$passCorrecto) {
            $mensaxe = "Contrasinal erróneo";
            header("Location:login.php?mensaxe=$mensaxe");
            exit;

        }else{
            $mensaxe = actualizarUltimaConexion($pdo, $usuario["id"]);

            if (str_contains($mensaxe, "Erro")) {
                header("Location:login.php?mensaxe=$mensaxe");
                exit;
            }else{
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