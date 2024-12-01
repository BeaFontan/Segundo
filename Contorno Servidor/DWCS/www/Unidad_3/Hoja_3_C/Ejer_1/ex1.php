<?php

$servidor="dbXDebug";
$usuario="root";
$passwd="root";
$base="hoja_3";

//CONECTAMOS
$conexion = new mysqli($servidor, $usuario, $passwd, $base);

//CONECTAMOS COA NOTACIÓN POO

if($conexion->connect_error) {
    die("Non é posible conectar coa BD: ". $conexion->connect_error);
}

$conexion->set_charset("utf8");

//PREPARAMOS A SENTENCIA:
$sentenciaPrep= $conexion->prepare("INSERT INTO cliente (nome,apelido,id) VALUES(?, ?, ?)");


//DATOS 1:

$codCliente=120;
$nome="Beatriz";
$apelidos="Fontan";

$sentenciaPrep->bind_param('ssi', $nome, $apelidos, $codCliente);

if(!$sentenciaPrep->execute()) { //EXECUTAMOS A CONSULTA
    echo "Houbo un erro na execución da consulta" . $sentenciaPrep->error."</br>";
}


//DATOS 2:

$codCliente=130;
$nome="Eva";
$apelidos="Loureiro";

$sentenciaPrep->bind_param('ssi', $nome, $apelidos, $codCliente);

if(!$sentenciaPrep->execute() )
    echo "Houbo un erro na execución da consulta" . $sentenciaPrep->error."</br>";

//CERRAMOS CONEXIONES
$sentenciaPrep->close();
$conexion->close();
?>