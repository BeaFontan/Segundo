<?php
include_once("DatosPersoa.php");

class Vendedor {
    
    use DatosPersoa;

    public function __toString()
    {
        return $this->mostrarValores();
    }
}

$vendedor = new Vendedor();
$vendedor->setNome("Juan");
$vendedor->setApelidos("Pérez");
$vendedor->setIdade(30);

echo $vendedor;
