<?php
session_start();

require_once "conexion.php";

function login($pdo, $email): mixed
{
    try {
        $query = $pdo->prepare("SELECT * FROM `usuarios` WHERE email like ?");
        $query->execute([$email]);
        $usurio = $query->fetch();
        return $usurio ?: 'Non existe o email';

    } catch (PDOException $e) {
        return "Erro no rexistro: " . $e->getMessage();
    }
}

function ultimaConexion($pdo, $id, $fecha): string
{
    try {
        $query = $pdo->prepare("UPDATE `usuarios` SET `ultima_conexion`=?  WHERE id like ?");
        $query->execute([$fecha, $id]);
        return '';

    } catch (PDOException $e) {
        return "Erro actualizando a data: " . $e->getMessage();
    }
}

if (isset($_POST["btnLogin"])) {
    $email = htmlspecialchars($_POST["txtEmail"]);
    $pass = htmlspecialchars($_POST["txtPass"]);
    $dataConexion = date("Y-m-d H:i:s");
    $idioma = $_POST["selectIdioma"];
    
    $usuario = login($pdo, $email);

    if (is_string($usuario)) {
        $mensaxe =  $usuario;
        header("Location:login.php?mensaxe=$mensaxe");
        exit();

    } else {
        $contrasinalCorrecto = password_verify($pass, $usuario["contrasinalsdf"]);

        if (!$contrasinalCorrecto) {
            $mensaxe = "Contrasinal incorrecto";
            header("Location:login.php?mensaxe=$mensaxe");
            exit();

        } else {
            
            $mensaxe = ultimaConexion($pdo, $usuario["id"], $dataConexion);

            if (str_contains($mensaxe, 'Erro')) {
                header("Location:login.php?mensaxe=$mensaxe");
                exit();

            }else{
                session_regenerate_id(true);

                setcookie("idioma_usuario", $idioma, time() + 604800);

                $datos = [
                    "id" => $usuario["id"],
                    "email" => $usuario["email"],
                    "rol" => $usuario["rol"]
                ];
    
                $_SESSION["datos"] = $datos;

                header("Location:mostra.php");

            }
        }
    }
}