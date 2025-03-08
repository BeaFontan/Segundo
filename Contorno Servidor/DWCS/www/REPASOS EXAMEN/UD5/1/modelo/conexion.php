<?php

declare(strict_types=1);

class Conexion extends PDO
{
    private string $host = "dbXdebug";
    private string $db = "musica";
    private string $user = "root";
    private string $pass = "root";
    private string $dsn;

    public function __construct()
    {
        $this->dsn = "mysql:host={$this->host};dbname={$this->db};charset=utf8mb4";

        try {
            parent::__construct($this->dsn, $this->user, $this->pass);

           // echo "Conexion realizada";

            $this->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            die("Erro na conexión");
        }
    }
}