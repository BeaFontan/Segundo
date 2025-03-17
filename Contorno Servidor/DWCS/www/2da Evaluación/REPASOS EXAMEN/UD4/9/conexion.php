<?php

try {
    $pdo = new PDO("mysql:host=dbXdebug;dbname=bea;charset=utf8mb4", "root", "root");
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    //echo "ok";
} catch (PDOException $e) {
    echo "Erro na conexión" . $e->getMessage();
}