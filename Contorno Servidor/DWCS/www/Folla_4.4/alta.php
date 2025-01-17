<?php

include('conexion.php');

$nomeUsuario = $_POST["txtNome"];
$contrasinalUsuario = password_hash($_POST["txtPass"], PASSWORD_DEFAULT);
$rolUsuario = $_POST["selectRol"];
$dataRexistro = date('1970-01-01 00:00:00');

try {
    $query =$pdo->prepare("INSERT INTO `usuariosTempo`(`nome`, `passwd`, `ultimaconexion`, `rol`) VALUES (?,?,?,?)");
    $query->execute([$nomeUsuario, $contrasinalUsuario, $dataRexistro, $rolUsuario]);
    header("login.php");
    exit;

} catch (\Throwable $th) {
    $mensaxe =  "Erro na insercción " . $e->getMessage();
}



?>