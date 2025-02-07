<?php

session_start();

include_once("conexion.php");

function validarLogin($pdo, $email)
{
    try {
        $query = $pdo->prepare("Select * from usuarios where email like ?");
        $query->execute([$email]);
        return $query->fetch();
    
    } catch (PDOException $e) {
        return "Erro validando login" . $e->getMessage();
    }  
}

function actualizarUltimaConexion($pdo, $user){
    $ultimaConexion = Date("Y-m-d H:i:s");

    try {
        $query = $pdo->prepare("UPDATE `usuarios` SET `ultima_conexion`= ? WHERE id = ?");
        $query->execute([$ultimaConexion, $user]);
    
    } catch (PDOException $e) {
        return "Erro validando login" . $e->getMessage();
    }  
}


if (isset($_POST["btnLogin"])) {
    try {
        $email = htmlspecialchars($_POST["txtEmailLogin"]);
        $contrasinal = htmlspecialchars($_POST["txtContrasinalLogin"]);

        $user = validarLogin($pdo, $email);

        if (empty($user)) {
            $mensaxe = $user;
            header("location:login.php?mensaxe=$mensaxe");
            exit;
            
        } else {
            $contrasinalCorrecto = password_verify($contrasinal, $user["contrasinal"]);

            if ($contrasinalCorrecto) {

                $mensaxe = actualizarUltimaConexion($pdo,$user["id"]);

                $datos = [
                    "id" => $user["id"],
                    "rol" => $user["rol"], 
                    "nome" => $user["nome"]
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
        $mensaxe = "Erro buscando admin" . $e->getMessage();
    }
} else {
    header("location:login.php");
    exit;
}
