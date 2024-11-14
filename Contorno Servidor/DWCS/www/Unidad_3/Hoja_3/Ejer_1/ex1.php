<?php

$servidor="dbXDebug";
$usuario="root";
$passwd="root";
$base="proba";

//CONECTAMOS
$conexion = new mysqli($servidor, $usuario, $passwd, $base);

//CONECTAMOS COA NOTACIÓN POO

if($conexion->connect_error) {
    die("Non é posible conectar coa BD: ". $conexion->connect_error);
}

$conexion->set_charset("utf8");

//PREPARAMOS A SENTENCIA:
$sentenciaPrep= $conexion->prepare("INSERT INTO cliente (codCliente,nome,apelido) VALUES(?, ?, ?)");

// DAMOS VALORES AOS PAŔÁMETROS E EXECUTAMOS:
$codCliente=100;
$nome="Beatriz";
$apelidos="Fontan";
$sentenciaPrep->bind_param('iss',$codCliente, $nome, $apelidos);

//VARIABLES
if(!$sentenciaPrep->execute()) { //EXECUTAMOS A CONSULTA
    echo "Houbo un erro na execución da consulta";
}

$codCliente=101;
$nome="Eva";
$apelidos="Loureiro";

$sentenciaPrep->bind_param('iss',$codCliente, $nome, $apelidos);

if(!$sentenciaPrep->execute() )
    echo "Houbo un erro na execución da consulta";
$sentenciaPrep->close();
$conexión->close();

?>