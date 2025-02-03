<?php

session_start();

include("conexion.php");


if (isset($_POST["btnLogin"])) {
    try {
        $email = htmlspecialchars($_POST["txtEmailLogin"]);
        $contrasinal = htmlspecialchars($_POST["txtContrasinalLogin"]);

        $query = $pdo->prepare("Select * from usuarios where email like ?");
        $query->execute([$email]);
        $user = $query->fetch();

        if (empty($user)) {
            $mensaxe = "Email incorrecto.";
            header("location:login.php?mensaxe=$mensaxe");
            exit;
            
        } else {
            $contrasinalCorrecto = password_verify($contrasinal, $user["contrasinal"]);

            if ($contrasinalCorrecto) {
                $datos = [
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
