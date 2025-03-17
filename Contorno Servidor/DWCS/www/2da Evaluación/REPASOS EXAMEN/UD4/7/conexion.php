<?php

try {
    $pdo = new PDO("mysql:host=dbXdebug;dbname=bea;charset=utf8mb4", "root", "root");
    $pdo->setAttribute(PDO::ERRMODE_EXCEPTION, PDO::ATTR_ERRMODE);
    //echo "ok";
} catch (PDOException $e) {
    echo "Erro na conexión " . $e->getMessage();
}