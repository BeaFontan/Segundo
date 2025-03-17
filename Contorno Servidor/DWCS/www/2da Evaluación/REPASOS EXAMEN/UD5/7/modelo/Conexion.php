<?php
declare(strict_types=1);

class Conexion extends PDO
{
    protected string $host = "dbXdebug";
    protected string $db = "musica";
    protected string $user = "root";
    protected string $pass = "root";
    protected string $dsn;

    public function __construct()
    {
        $this->dsn = "mysql:host={$this->host};dbname={$this->db};charset=utf8mb4";

        try {
            parent::__construct($this->dsn, $this->user, $this->pass);
            $this->setAttribute(PDO::ERRMODE_EXCEPTION, PDO::ATTR_ERRMODE);

        } catch (PDOException $e) {
            die("Erro na conexión" . $e->getMessage());
        }
    }
}