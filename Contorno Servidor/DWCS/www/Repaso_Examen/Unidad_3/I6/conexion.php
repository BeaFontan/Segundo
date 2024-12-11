<?php
try {
    $pdo = new PDO("mysql:host=dbXDebug;dbname=senderismo;charset=utf8", 'root', 'root');
    $pdo->setAttribute(PDO::ERRMODE_EXCEPTION, PDO::ATTR_ERRMODE);
    //echo "Conexión realizada";

} catch (PDOException $e) {
    echo "Erro na conexión " . $e->getMessage();
}
?>