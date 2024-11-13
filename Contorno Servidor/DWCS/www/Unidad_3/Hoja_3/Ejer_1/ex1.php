<?php
$servidor = "dbXdebug";
$usuario = "root";
$passwd = "root";
$base = "proba";

// CONECTAMOS
$conexion = new mysqli($servidor, $usuario, $passwd, $base);
if ($conexion->connect_error) {
    die("Non é posible conectar coa BD: " . $conexion->connect_error);
}
$conexion->set_charset("utf8");

// PREPARAMOS A SENTENCIA:
$sentenciaPrep = $conexion->prepare("INSERT INTO cliente (codCliente, nome, apelidos) VALUES (?, ?, ?)");
if (!$sentenciaPrep) {
    die("Erro na preparación da consulta: " . $conexion->error);
}

// DAMOS VALORES AOS PARÁMETROS E EXECUTAMOS:
$codCliente = 100;
$nome = "Xan";
$apelidos = "Fieito";
$sentenciaPrep->bind_param('iss', $codCliente, $nome, $apelidos);
if (!$sentenciaPrep->execute()) {
    echo "Houbo un erro na execución da consulta: " . $sentenciaPrep->error;
}

// INSERCIÓN DO SEGUNDO CLIENTE
$codCliente = 101;
$nome = "Eva";
$apelidos = "Loureiro";
if (!$sentenciaPrep->execute()) {
    echo "Houbo un erro na execución da consulta: " . $sentenciaPrep->error;
}

// PECHAMOS AS CONEXIÓNS
$sentenciaPrep->close();
$conexion->close();
