<?php

declare(strict_types=1);

class Vehiculo{

    private string $matricula;
    private string $modelo;
    private float $km;

    public function __construct($matricula, $modelo, $km) 
    {
        $this->matricula = $matricula;
        $this->modelo = $modelo;
        $this->km = $km;
    }

    public function GetMatricula():string
    {
        return $this->matricula;
    }

    public function GetModelo():string
    {
        return $this->modelo;
    }

    public function Getkm():float
    {
        return $this->km;
    }

    public function mostraEnTR():string
    {
        return "<tr>
                    <td>$this->GetMatricula()</td>
                    <td>$this->GetModelo()</td>
                    <td>$this->Getkm()</td>
                </tr>";
    }


}
?>