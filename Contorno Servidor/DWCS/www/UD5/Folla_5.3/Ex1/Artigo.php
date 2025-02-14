<?php

declare(strict_types=1);

class Artigo {

    private int $id;
    private string $nome;

    public function __construct($id, $nome)
    {
        $this->id = $id;
        $this->nome = $nome;
    }

    public function __clone() :void
    {
        $this->id++;
    }


    public function __set($atributo, $valor) : void
    {
        if (property_exists(__CLASS__, $atributo)) {

            $this->$atributo = $valor;

        } else {
            echo "Non existe o atributo $atributo";
        }
    }

    public function __get($atributo):mixed
    {
        if (property_exists(__CLASS__, $atributo)) {
            return $this->$atributo;
        }

        return null;
    }

    public function __tostring():string
    {
        return "ID: ". $this->id ."Nome: " . $this->nome;
    }
}


$artigo = new Artigo(1,"pantalla");

echo $artigo;

$artigoClon = clone $artigo;

$artigoClon->nome = "mesa";

echo $artigoClon;

?>