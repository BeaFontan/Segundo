<?php

class Empregado {

    //PROPIEDADES
    public $nome;
    public $salario;
    public static $numEmpregados=0;

    //MÉTODOS
    public function __construct($nome, $salario){
        $this->nome=$nome;
        self::$numEmpregados++;

        if ($salario > 2000) {
            echo "O salario non pode superar os 2000 euros";
        } else {
            $this->salario = $salario;
        }
    }

    public function asignaNome($nomeIndicado) 
    {
        $this->nome = $nomeIndicado;
    }

    public function getNome() 
    {
        return $this->nome;
    }

    public function getSalario()
    {
        return $this->salario;
    }

    public function __destruct()
    {
     echo "<br>obxecto de nome ".$this->nome." foi destruído<br>";
    }

}

// CLASE OPERARIO FILLA DE EMPREGADO:
class Operario extends Empregado
{
    public $turno;

    public function __construct($nome, $salario, $turno)
    {
        parent::__construct($nome, $salario);

        if (strcmp($turno, "diurno") != 0 || strcmp($turno, "nocturno") != 0 ) {
            echo " Non pode ser distinto de diurno ou nocturno";
        } else {
            $this->turno = $turno;
        }
    }

    public function __destruct()
    {
        parent::__destruct(); //EXECÚTASE O CONSTRUTOR DE EMPREGADO
    }

    public function getTurno()
    {
        return $this->turno;
    }

    public function setTurno($turnoEnviado){
        if ($turnoEnviado == "diurno" || $turnoEnviado == "nocturno")
        $this->turno=$turnoEnviado;
    }
}

    $miguel = new Empregado("miguel", 1000);
    $ana = new Empregado("maria", 1500);

    echo "os novos empregados son ". $miguel->nome." e ".$ana->getNome()."<br>";

    $pedro = new operario("pedro", 1800, "nocturno");

    echo "O operario ", $pedro->getNome()," ten o turno ".$pedro->getTurno()."<br>";
    //USAMOS O MÉTODO getNome() DA CLASE NAI


    echo "O operario ", $pedro->getNome()," ten o turno ".$pedro->getTurno()."<br>";
    echo "<br>Levamos ".Empregado::$numEmpregados." empregados"."<br>";


    /////////////////////////////
?>