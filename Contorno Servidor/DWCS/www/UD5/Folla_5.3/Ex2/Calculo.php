<?php

declare(strict_types=1);

abstract class Calculo {

    protected float $operando1;
    protected float $operando2;
    protected float $resultado;

    abstract public function setOperando1($operando1);

    abstract public function setOperando2($operando2);

    abstract public function getResultado();

    abstract public function Calcular($operando1, $operando2);

}