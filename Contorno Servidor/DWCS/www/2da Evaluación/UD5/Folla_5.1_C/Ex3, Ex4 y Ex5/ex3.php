<?php

declare(strict_types=1);

class Bombilla {

    private int $potencia;
    
    private static int $numBombillas = 0;

    public function __construct()
    {
        $this->potencia = 10;
        Bombilla::$numBombillas++;
    }

    public function getPotencia():int
    {
        return $this->potencia;
    }

    public function setPotencia(int $potencia)
    {
        $this->potencia = $potencia;
    }

    public function aumentaPotencia(int $val)
    {
        if ($val > 35 ) {
            echo "Non se pode aumentar máis de 35";
        }else{
            $this->potencia += $val;
        }
    }

    public function baixaPotencia(int $val)
    {
        if ($val < 2 ) {
            echo "Non pode ser menor a 2";
        }else{
            $this->potencia -= $val;
        }
    }

    public static function getNumBombillas():int
    {
        return Bombilla::$numBombillas;
    }

    public function toString():void
    {
       echo "A potencia é " . $this->getPotencia() . "</br>";
    }

    public function __destruct()
    {
        Bombilla::$numBombillas--;
        echo "O número de bombilla" . $this->getNumBombillas();
    }

}

// $bombilla = new Bombilla();

// $bombilla->toString();

// $bombilla->setPotencia(60);

// $bombilla->toString();

// $bombilla->aumentaPotencia(50);

// $bombilla->toString();

// $bombilla->baixaPotencia(10);

// $bombilla->toString();

// $bombilla->setPotencia(10);

// $bombilla->toString();

// $bombilla->baixaPotencia(20);

// $bombilla->toString();




$bombilla1 = new Bombilla();

$bombilla1->aumentaPotencia(20);

$bombilla1->toString();

echo Bombilla::getNumBombillas();


$bombilla2 = new Bombilla();

$bombilla2->aumentaPotencia(30);

$bombilla2->toString();



unset($bombilla1);

echo $bombilla2->getNumBombillas();


$bombilla2->baixaPotencia(10);

$bombilla2->toString();

unset($bombilla2);

