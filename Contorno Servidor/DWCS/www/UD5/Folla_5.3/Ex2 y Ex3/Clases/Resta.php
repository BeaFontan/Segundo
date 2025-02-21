<?php

declare(strict_types=1);
require_once("Calculo.php");

class Resta extends Calculo {

    public function setOperando1($operando1): void
    {
        if (empty($operando1)) {
            echo "Non introduciches un valor";
        } else {
            $this->operando1 = (float) $operando1;
        }
    }

    public function setOperando2($operando2): void
    {
        if (empty($operando2)) {
            echo "Non introduciches un valor";
        } else {
            $this->operando2 = (float) $operando2;
        }
    }

    public function Calcular(): void
    {
        $this->resultado = $this->operando1 - $this->operando2;
    }

    public function getResultado(): string
    {
        return "O resultado da resta é " . $this->resultado;
    }
}
