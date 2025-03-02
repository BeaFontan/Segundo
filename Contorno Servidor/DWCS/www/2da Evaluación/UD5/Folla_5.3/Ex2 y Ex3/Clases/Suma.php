<?php

declare(strict_types=1);
require_once("Calculo.php");

class Suma extends Calculo {

    public function setOperando1($operando1): string
    {
        if (empty($operando1)) {
            return "Non introduciches un valor";
        } else {
            $this->operando1 = (float) $operando1;
            return '';
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
        $this->resultado = $this->operando1 + $this->operando2;
    }

    public function getResultado(): string
    {
        return "O resultado da suma é " . $this->resultado;
    }
}
