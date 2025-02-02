<?php

try {
    $pdo = new PDO("mysql:host=dbXdebug;dbname=tarefa4.7", "tarefa", "Tarefa4.7");
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Conexión realizda";

} catch (PDOException $e) {
    echo "Erro na conexión" . $e->getMessage();
}

?>