<?php
session_start();

if (!isset($_SESSION["datos"])) {
    header("location:login.php");
    exit;
}

$usuario = $_SESSION["datos"]["usuario"];
$contrasinal = $_SESSION["datos"]["contrasinal"];

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
        $_SESSION["datos"]["rol"] = $usuarioBase["rol"];
        $_SESSION["datos"]["ultimaconexion"] = $usuarioBase["ultimaconexion"];

        header("location:mostra.php");
        exit;
    }else {
        $mensaxe = "O contrasinal non é correcto";

        header("location:login.php?mensaxe=$mensaxe");
        exit;
    }
}


?>