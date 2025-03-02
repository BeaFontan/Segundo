<?php

declare(strict_types=1);

trait DatosPersoa 
{
    private string $nome;
    private string $apelidos;
    private int $idade;

    public function setNome(string $nome):void
    {
        $this->nome = $nome;
    }

    public function getNome():string
    {
       return $this->nome;
    }

    public function setApelidos(string $apelidos):void
    {
        $this->apelidos = $apelidos;
    }

    public function getApelidos():string
    {
       return $this->apelidos;
    }

    public function setIdade(int $idade):void
    {
        $this->idade = $idade;
    }

    public function getIdade():int
    {
       return $this->idade;
    }

    public function mostrarValores():string
    {
        return "Nome: " . $this->getNome() . ", Apelidos: " . $this->getApelidos() . ", Idade: " . $this->getIdade();
    }
}