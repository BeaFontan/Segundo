<?php

//CONEXIÓN A LA BASE DE DATOS

$servidor="dbXDebug";
$usuario="root";
$passwd="root";
$base="proba";

try {
    $pdo = new PDO("mysql:host=$servidor;dbname=$base; charset", $usuario, $passwd);

    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    echo "Todo ben na conexión";


} catch (PDOException $e) {
    throw new Exception(["Erro na conexión", $e->getMessage()]);
    
}


//INSERCCIONES

//Con marcadores anónimos
$id = 1003;
$nome = "Beatriz3";
$apelido = "Fontán3";

try {
    $pdoStatement = $pdo->prepare("INSERT INTO cliente (codCliente, nome, apelido) VALUES (?,?,?)");

    //puedes pasar del bind param y pasar un array a secas directemente al execute.
    $pdoStatement->execute(array($id,$nome,$apelido));

    echo "insercción realizada";

} catch (PDOException $e) {
    throw new Exception(["Erro na primeira insercción", $e->getMessage()]);
}

//Con marcadores anónimos
$id = 1022;
$nome = "Freya2";
$apelido = "Fontán2";

try {
    $pdoStatement = $pdo->prepare("INSERT INTO cliente (codCliente, nome, apelido) VALUES (:codCliente, :nome, :apelido)");

    $pdoStatement->bindParam(':codCliente', $id);
    $pdoStatement->bindParam(':nome', $nome);
    $pdoStatement->bindParam(':apelido', $apelido);

    $pdoStatement->execute();

    echo "insercción realizada";

} catch (PDOException $e) {
    throw new Exception(["Erro na segunda insercción", $e->getMessage()]);
}

//Con array asociativo
$arrayCliente = ['codCliente' => 1031, 'nome' => 'Ares', 'apelido' => 'Fontán'];

try {

    $pdoStatement = $pdo->prepare("INSERT INTO cliente (codCliente, nome, apelido) VALUES (:codCliente, :nome, :apelido)");

    $pdoStatement->execute($arrayCliente);
    echo "insercción realizada";
   
} catch (PDOException $e) {

    throw new Exception(["Erro na segunda insercción", $e->getMessage()]);

}finally{

    $pdo = null;
}

?>