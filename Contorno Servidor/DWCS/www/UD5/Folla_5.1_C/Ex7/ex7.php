<?php

declare(strict_types=1);

class Planeta {
    private string $nome;
    private int $tamaño;
    private bool $accesible;
    private float $distancia;
    private static int $numPlanetasAccesibles = 0;

    public const CONSTANTE = 1;

    public function __construct($nome, $tamaño, $distancia) {
        $this->nome = $nome;
        $this->tamaño = $tamaño;
        $this->accesible = true;
        $this->distancia = $distancia;
        self::$numPlanetasAccesibles++;
    }

    public function setNome($nome):void
    {
        $this->nome = $nome;
    }

    public function getNome():string
    {
        return $this->nome;
    }

    public function setTamaño($tamaño):void
    {
        $this->tamaño = $tamaño;
    }

    public function getTamaño():int
    {
        return $this->tamaño;
    }

    public function setdistancia($distancia):void
    {
        $this->distancia = $distancia;
    }

    public function getDistancia():float
    {
        return $this->distancia;
    }


    public function getNumPlanetas():int
    {
        return self::$numPlanetasAccesibles;
    }

    public function explotou():void
    {
        $this->accesible = false;
        self::$numPlanetasAccesibles--;
    }
  
}


class PlanetaHabitable extends Planeta{
    private int $numPersoas;
    private float $temperaturaMinima;
    private float $temperaturaMaxima;

    public function __construct($nome, $tamaño, $distancia, $numPersoas, $temperaturaMinima, $temperaturaMaxima){
        parent::__construct($nome, $tamaño, $distancia);
        $this->numPersoas = $numPersoas;
        $this->temperaturaMinima = $temperaturaMinima;
        $this->temperaturaMaxima = $temperaturaMaxima;
    }

    public function setNumPersonas($numPersoas):void
    {
        $this->numPersoas = $numPersoas;
    }

    public function getNumPersoas():int
    {
        return $this->numPersoas;
    }

    public function setTemperaturaMinima($temperaturaMinima):void
    {
        $this->temperaturaMinima = $temperaturaMinima;
    }

    public function getTemperaturaMinima():float
    {
        return $this->temperaturaMinima;
    }

    public function setTemperaturaMaxima($temperaturaMaxima):void
    {
        $this->temperaturaMaxima = $temperaturaMaxima;
    }

    public function getTemperaturaMaxima():float
    {
        return $this->temperaturaMaxima;
    }

    public function listarTodo():string
    {
        return "Nome: ".$this->getNome() .
               "Tamaño: ".$this->getTamaño() .
               "Distancia: ".$this->getDistancia() .
               "Número de planetas".$this->getNumPlanetas();
               "Personas: $numPersoas, Temperatura Máxima:$temperaturaMaxima, Temperatura mínima: $temperaturaMinima";
    }
}


class PlanetaHostil extends Planeta{
    private bool $vida;
    private bool $fontesEnerxia;

    public function __construct($nome, $tamaño, $distancia, $vida, $fontesEnerxia ){
        parent::__construct($nome, $tamaño, $distancia);
        $this->vida = $vida;
        $this->fontesEnerxia = $fontesEnerxia;
    }

    public function setVida($vida):void
    {
        $this->vida = $vida;
    }

    public function getVida():string
    {
        return $this->vida;
    }

    public function setFontesEnerxia($fontesEnerxia):void
    {
        $this->fontesEnerxia = $fontesEnerxia;
    }

    public function getFontesEnerxia():string
    {
        return $this->fontesEnerxia;
    }

    public function listarTodo():string
    {
        return "Nome: ".$this->getNome() .
        "Tamaño: ".$this->getTamaño() .
        "Distancia: ".$this->getDistancia() .
        "Número de planetas".$this->getNumPlanetas();
       "Vida:$vida, Fontes Enerxía: $fontesEnerxia";
    }
}


$planetaHabitable = new PlanetaHabitable("Fión", 24, 1.5, 100000000, 0, 10);
echo $planetaHabitable->listarTodo();


$planetaHabitable->setdistancia(50);

$planetaHabitable->setNome("Sión cambiado");

echo $planetaHabitable->listarTodo();



$planetaHostil= new PlanetaHostil("Kaleva", 50, 0.4, true, true);
echo $planetaHabitable->listarTodo();



$planetaHostil->explotou();
echo $planetaHabitable->listarTodo();


$planeta = new Planeta("nome", 10, 10);

echo "Esta es la constante" .$planeta::CONSTANTE;

?>

