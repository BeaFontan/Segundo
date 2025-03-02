<?php

class Contacto {
    private $nome;
    private $apelidos;
    private $telefono;

    public function __construct($nome, $apelidos, $telefono){
        $this->nome = $nome;
        $this->apelidos = $apelidos;
        $this->telefono = $telefono;
    }

    public function getNome()
    {
        return $this->nome;
    }

    public function getApelidos()
    {
        return $this->apelidos;
    }

    public function getTelefono()
    {
        return $this->telefono;
    }

    public function setNome($nome)
    {
        $nome = strtoupper($nome[0]);
        $this->nome = $nome;
    }

    public function setApelidos($apelidos)
    {
        $apelidosSeparados = explode(' ', $apelidos);
        $apelidosSeparados[0] = ucwords($apelidosSeparados[0]);
        $apelidosSeparados[1] = ucwords($apelidosSeparados[1]);

        $this->apelidos = $apelidosSeparados;
    }

    public function setTelfono($telefono)
    {
        if (strlen($telefono) !== 9) {
            echo "Número de teléfono incorrecto";
        }else{
            $this->telefono = $telefono;
        }
        
    }

    public function toString()
    {
        echo $this->nome . " ". $this->apelidos . " ". $this->telefono . " / ";
    }

    public function __destruct()
    {
        echo " Obxecto destruido " . $this->nome;
    }

}


$contacto1 = new Contacto("Maria", "perez vazquez", 999999999);

$contacto1->toString();

$contacto2 = new Contacto("Pedro", "Lopez Diaz", 41547854);

$contacto2->toString();

$contacto3 = new Contacto("Paco", "perez vazquez", 254125417);

$contacto3->toString();

