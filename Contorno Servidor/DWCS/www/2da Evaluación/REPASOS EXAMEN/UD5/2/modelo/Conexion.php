<?php

declare(strict_types=1);

class Conexion extends PDO
{
    protected string $host = "dbXdebug";
    protected string $db = "musica";
    protected string $user = "root";
    protected string $pass = "root";
    protected string $dns;

    public function __construct()
    {
        $this->dns = "mysql:host={$this->host};dbname={$this->db};charset=utf8mb4";

        try {
            parent::__construct($this->dns, $this->user, $this->pass);
            $this->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        } catch (PDOException $e) {
            echo "Erro na conexión";
        }
    }
}