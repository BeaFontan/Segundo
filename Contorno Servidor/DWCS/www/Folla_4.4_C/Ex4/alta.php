<?php

session_start();

if (!isset($_SESSION["datos"])) {
    header("location:login.php");
    exit;
}

if (isset($_POST["btnRegistro"])) {
    include('conexion.php');

    $nomeUsuario = $_POST["txtNome"];
    $contrasinalUsuario = password_hash($_POST["txtPass"], PASSWORD_DEFAULT);
    $rolUsuario = $_POST["selectRol"];;
    $dataRexistro = date('1970-01-01 00:00:00');

    try {
        $query = $pdo->prepare("INSERT INTO `usuariosTempo`(`nome`, `passwd`, `ultimaconexion`, `rol`) VALUES (?,?,?,?)");
        $query->execute([$nomeUsuario, $contrasinalUsuario, $dataRexistro, $rolUsuario]);
        $mensaxe = "Rexistro completado con éxito";

    } catch (PDOException $e) {
        $mensaxe =  "Erro na insercción " . $e->getMessage();
        header("location:rexistro.html?mensaxe=$mensaxe");
        exit;
    }

    header("location:login.php?mensaxe=$mensaxe");
    exit;
}
