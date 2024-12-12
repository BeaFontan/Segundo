<?php

//Primero hago la conexión

try {
    $pdo = new PDO("mysql:host=dbXDebug;dbname=proba; charset=utf8mb4", 'root', 'root');

    //Atributos para lanzar la excepción
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    echo "Realizada conexción";

} catch (PDOException $e) {
    throw new PDOException(["Erro na conexión", $e->getMessage()]);
}

//Insercción 

$botonInsertar = isset($_GET["botonIntroducir"]);

if ($botonInsertar) {
    try {
        $id = $_GET["campoId"];
        $nome = $_GET["campoNome"];
        $apelido = $_GET["campoApelido"];
    
        $inserccion = $pdo->prepare("INSERT INTO cliente (codCliente, nome, apelido) VALUES (?,?,?)");
    
        $inserccion->execute(array($id,$nome,$apelido));
    
        echo "Cliente insertado";
    
    } catch (PDOException $e) {
        echo "Erro na introducción " .$e->getMessage();
    }

} 

$pdo->close();
?>