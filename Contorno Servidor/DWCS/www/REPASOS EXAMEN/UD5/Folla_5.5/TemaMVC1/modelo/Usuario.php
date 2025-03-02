<?php

declare(strict_types=1);

class Usuario
{
    protected string $usuario;
    protected string $pass;

    public function __construct(string $usuario, string $pass)
    {
        $this->usuario = $usuario;
        $this->pass = $pass;
    }

}