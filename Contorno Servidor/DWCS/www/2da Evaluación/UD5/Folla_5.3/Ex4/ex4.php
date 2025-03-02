<?php
abstract class Coche
{
    abstract public function consumir();
}

class CocheGasolina extends Coche
{
    public function consumir()
    {
        return 'O ' . __CLASS__ . ' consume Gasolina';
    }
}


class CocheElectrico extends Coche
{
    public function consumir()
    {
        return 'O ' . __CLASS__ . ' consume electricidade';
    }
}

// A FUNCIÓN mostra() EMPREGA UN OBXECTO Coche COMO PARÁMETRO: EN TEMPO DE
// EXECUCIÓN DECIDIRÁ CAL FUNCIÓN É A APROPIADA.

function mostrar(Coche $coche)
{
    echo $coche->consumir(). "<br>";
}


interface Mostrando
{
    public function listaTodo();
}


class CocheHidroxeno extends Coche
{
    public function consumir(){}
}

$cochegasolina = new CocheGasolina();
$cocheelectrico = new CocheElectrico();
mostrar($cochegasolina);
mostrar($cocheelectrico);