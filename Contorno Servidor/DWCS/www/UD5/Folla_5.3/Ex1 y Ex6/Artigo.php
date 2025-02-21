<?php

declare(strict_types=1);
include_once("Comparar.php");

class Artigo implements Comparar{

    private int $id;
    private string $nome;
    private float $prezo;

    public function __construct($id, $nome)
    {
        $this->id = $id;
        $this->nome = $nome;
    }

    public function __clone() :void
    {
        $this->id++;
    }

    public function setPrezo(float $prezo)
    {
        $this->prezo = $prezo;
    }

    public function comparar($prezo)
    {

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
        return "ID: ". $this->__get($id) ."Nome: " . $this->__get($nome) ."Prezo: " . $this->prezo;
    }
}


$artigo = new Artigo(1,"pantalla");

echo $artigo;

$artigoClon = clone $artigo;

$artigoClon->nome = "mesa";

echo $artigoClon;

?>