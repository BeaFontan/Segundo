<?php
session_start();

include_once("conexion.php");

function validarLogin($pdo, $email)
{
    try {
        $query = $pdo->prepare("Select * from usuarios where email like ?");
        $query->execute([$email]);
        $usuario = $query->fetch();
        return $usuario ?: "Non se atopa o usuario";
    
    } catch (PDOException $e) {
        return "Erro validando login" . $e->getMessage();
    }  
}

function actualizarUltimaConexion($pdo, $usuario)
{
    $ultimaConexion = Date("Y-m-d H:i:s");

    try {
        $query = $pdo->prepare("UPDATE `usuarios` SET `ultima_conexion`= ? WHERE id = ?");
        $query->execute([$ultimaConexion, $usuario]);
    
    } catch (PDOException $e) {
        return "Erro validando login" . $e->getMessage();
    }  
}


if (isset($_POST["btnLogin"])) {
    try {
        $email = htmlspecialchars($_POST["txtEmailLogin"]);
        $contrasinal = htmlspecialchars($_POST["txtContrasinalLogin"]);
        $idioma = $_POST["selectIdioma"] ?? "castellano";

        $usuario = validarLogin($pdo, $email);

        if (is_string($usuario) == true) {
            $mensaxe = $usuario;
            header("location:login.php?mensaxe=$mensaxe");
            exit;
            
        } else {
            $contrasinalCorrecto = password_verify($contrasinal, $usuario["contrasinal"]);

            if ($contrasinalCorrecto) {

                $mensaxe = actualizarUltimaConexion($pdo,$usuario["id"]);

                session_regenerate_id(true); 
                
                setcookie("idioma_usuario", $idioma, time() + 604800);
                
                $datos = [
                    "id" => $usuario["id"],
                    "rol" => $usuario["rol"], 
                    "nome" => $usuario["nome"]
                ];

                $_SESSION["datos"] = $datos; 

                header("location:mostra.php");
                exit;

            }else{
                $mensaxe = "Contrasinal incorrecto";
                header("location:login.php?mensaxe=$mensaxe");
                exit;
            }
        }
    } catch (PDOException $e) {
        $mensaxe = "Erro buscando usuario" . $e->getMessage();
    }
}else {
    header("location:login.php");
    exit;
}

