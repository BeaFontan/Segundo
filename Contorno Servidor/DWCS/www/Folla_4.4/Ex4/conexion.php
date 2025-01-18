<?php

try {
    $pdo = new PDO("mysql:host=dbXdebug;dbname=Usuarios", "root", "root");
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        //echo "Conexión realizada";
} catch (PDOException $e) {
    echo "Erro na conexión " . $e->getMessage();
}

?>