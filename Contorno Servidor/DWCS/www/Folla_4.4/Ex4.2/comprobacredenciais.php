<?php
session_start();

if (isset($_POST["btnLogin"])) {
 
    $usuario = $_POST["txtNome"];
    $contrasinal = $_POST["txtPass"];

    include("conexion.php");

    try {
        $query = $pdo->prepare("Select * from usuariosTempo where nome like ?");
        $query->execute([$usuario]);
        $usuarioBase = $query->fetch();

    } catch (PDOException $e) {
        $mensaxe = "Erro buscando na base". $e->getMessage();
    }

    if (empty($usuarioBase)) {
        $mensaxe = "Non existe o usuario";
        
        header("location:login.php?mensaxe=$mensaxe");
        exit;
    }else {
        $contrasinalCorrecto = password_verify($contrasinal, $usuarioBase["passwd"]);

        if ($contrasinalCorrecto) {
            $datos = ["usuario" => $usuarioBase["nome"], "rol" =>$usuarioBase["rol"], "ultimaconexion" => $usuarioBase["ultimaconexion"]];
            $_SESSION["datos"] = $datos;

            header("location:mostra.php");
            exit;
        }else {
            $mensaxe = "O contrasinal non é correcto";

            header("location:login.php?mensaxe=$mensaxe");
            exit;
        }
    }
}else{
    header("location:login.php");
    exit;
}
?>