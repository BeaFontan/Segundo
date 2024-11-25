<?php

try {
    $pdo = new PDO ("mysql:host=dbXDebug;dbname=proba;charset=utf8",'root','root');

    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    echo "Conexión resalizada correctamente";
} catch (PDOException $th) {
    echo "Erro na conexión" . $e->getMessage();
}


//Mostrar todos solo al cargar

try{
    $queryClientes=$pdo->query("select * from cliente");

    $queryClientes->execute();

    $arrayClientes = $queryClientes->fetchAll();

} catch(PDOException $e) {
    echo " Erro mostrando os clientes!".$e->getMessage();
}

//Busqueda
$botonBusqueda = isset($_get["botonBuscar"]);
$buscarNombre = $_GET["buscarNome"];
$buscarApelido = $_GET["buscarApelido"];

if ($botonBusqueda) {
    if ($buscarNombre) {
        try {
            $queryNome = $pdo->prepare("select * from cliente where nome like ?");
            




        } catch (\Throwable $th) {
            //throw $th;
        }
    } 

    if (condition) {
        # code...
    }

}

$pdo->close();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="5.php" method="get">

        <table>
            <tr>
                <th>id</th>
                <th>Nome</th>
                <th>Apelido</th>
            </tr>
            <?php
            foreach ($arrayClientes as $cliente) {
                echo "<tr>
                        <td>{$cliente[0]}</td>
                        <td>{$cliente[1]}</td> 
                        <td>{$cliente[2]}</td> 
                    </tr>";
            }
            ?>
           
        </table>
        <input type="text" name="buscarNome" placeholder="Buscar Nome">
        <input type="text" name="buscarApelido" placeholder="Buscar apelido">

        <button type="submit" name="botonBuscar" value="buscar">Buscar</button>
    </form>
</body>
</html>