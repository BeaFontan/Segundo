<?php

if (isset($_POST["btnRegistro"])) {
    $usuario = $_POST["textNome"];
    $passHasheado=password_hash($_POST["textPass"], PASSWORD_DEFAULT);

    try {
        $pdo = new PDO("mysql:host=dbXDebug;dbname=Usuarios;charset=utf8", "root", "root");
        $pdo->setAttribute(PDO::ERRMODE_EXCEPTION, PDO::ATTR_ERRMODE);
        //echo "Conexión realizada";
    
    } catch (PDOException $e) {
        echo "Erro na conexión " . $e->getMessage();
    }

    try {
        $query = $pdo->prepare("INSERT INTO `datos`(`nome`, `pass`) VALUES (?,?)");
        $query->execute([$usuario, $passHasheado]);
        echo "Rexistro completado";
    
    } catch (PDOException $e) {
        echo "Erro na insercción " . $e->getMessage();
    }
}?>