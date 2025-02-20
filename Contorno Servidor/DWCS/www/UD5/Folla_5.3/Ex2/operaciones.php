<?php

require_once("Clases/Suma.php");
require_once("Clases/Resta.php");
require_once("Clases/Multiplicacion.php");


$operacion=new Suma();
$operacion->setOperando1(5);
$operacion->setOperando2();
$operacion->calcular();
echo $operacion->getResultado();

$operacion=new Resta();
$operacion->setOperando1(4);
$operacion->setOperando2(7);
$operacion->calcular();
echo $operacion->getResultado();

$operacion=new Multiplicacion();
$operacion->setOperando1(5);
$operacion->setOperando2(7);
$operacion->calcular();
echo $operacion->getResultado();
?>