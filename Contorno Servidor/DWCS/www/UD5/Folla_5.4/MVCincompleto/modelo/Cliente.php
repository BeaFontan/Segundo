<?php


class Cliente
{
    protected string $nome;
    protected $apelidos;
    protected $email;
    const TABLA = 'clientes';

    public function __construct($nom, $apel, $mail)
    {
        $this->nome = $nom;
        $this->apelidos = $apel;
        $this->email = $mail;
    }

    public function mostra(): void  {
        echo "Nome:{$this->nome}, apelidos:{$this->apelidos}, email:{$this->email} <br>";
    }
 }
