<?php

declare(strict_types=1);

class Planeta {
    private string $nome;
    private int $tamaño;
    private bool $accesible;
    private float $distancia;
    private static int $numPlanetasAccesibles = 0;

    public function __construct($nome, $tamaño, $distancia) {
        $this->nome = $nome;
        $this->tamaño = $tamaño;
        $this->accesible = true;
        $this->distancia = $distancia;
        $numPlanetasAccesibles++;
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

    public function getTamaño():string
    {
        return $this->tamaño;
    }

    public function setdistancia($distancia):void
    {
        $this->distancia = $distancia;
    }

    public function getDistancia():string
    {
        return $this->distancia;
    }

    public function explotou():void
    {
        $this->accesible = false;
        $numPlanetasAccesibles--;
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

    public function getNumPersoas():string
    {
        return $this->numPersoas;
    }

    public function setTemperaturaMinima($temperaturaMinima):void
    {
        $this->temperaturaMinima = $temperaturaMinima;
    }

    public function getTemperaturaMinima():string
    {
        return $this->temperaturaMinima;
    }

    public function setTemperaturaMaxima($temperaturaMaxima):void
    {
        $this->temperaturaMaxima = $temperaturaMaxima;
    }

    public function getTemperaturaMaxima():string
    {
        return $this->temperaturaMaxima;
    }

    public function listarTodo():string
    {
        return "Nome: ".getNome() .
               "Tamaño: ".getTamaño() .
               "Distancia: ".getDistancia() .


               
        
        ", Tamaño: $Num personas: $numPersoas, Temperatura Máxima:$temperaturaMaxima, Temperatura mínima: $temperaturaMinima";
    }
}


class PlanetaHostil extends Planeta{
    private bool $vida;
    private bool $fontesEnerxia;

    public function __construct($nome, $tamaño, $distancia, $vida, $fontesEnerxia ){
        parent::__construct($nome, $tamaño, $distancia);
        $this->numPersoas = $numPersoas;
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
        return "Vida: $vida, Fontes:$fontesEnerxia";
    }

}


?>