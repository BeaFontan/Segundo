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


//DATOS:
$clientes = [
    [
        "codCliente" => 1400,
        "nome" => "Beatriz",
        "apelidos" => "Fontan"
    ],
    [
        "codCliente" => 1410,
        "nome" => "Carlos",
        "apelidos" => "Pérez"
    ],
    [
        "codCliente" => 1420,
        "nome" => "Ana",
        "apelidos" => "Gómez"
    ]
];

foreach ($clientes as $cliente) {
    $nome = $cliente['nome'];
    $apelidos = $cliente['apelidos'];
    $codCliente = $cliente['codCliente'];

    $sentenciaPrep->bind_param('ssi', $nome, $apelidos, $codCliente);

    if(!$sentenciaPrep->execute()) { //EXECUTAMOS A CONSULTA
        echo "Houbo un erro na execución da consulta" . $sentenciaPrep->error."</br>";
    } else {
        echo "Todo correcto";
    }
}

//CERRAMOS CONEXIONES
$sentenciaPrep->close();
$conexion->close();
?>