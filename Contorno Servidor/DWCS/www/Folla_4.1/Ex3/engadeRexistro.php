<?php
    session_start();

    $registroEnBase = "";

    if (!isset($_SESSION["datos"])) {
        header("location:login.php");
    }

    if (isset($_POST["botonAgregar"])) {

        try {
            $pdo = new PDO("mysql:host=dbXDebug;dbname=Empresa;charset=utf8", $_SESSION["datos"]["nome"], $_SESSION["datos"]["constrasinal"]);
            $pdo->setAttribute(PDO::ERRMODE_EXCEPTION, PDO::ATTR_ERRMODE);
        
        } catch (PDOException $e) {
            $mensaxe =  "Erro na conexión " . $e->getMessage();
        }

        $numero = $_POST["textNumero"];
        $nome = $_POST["textNome"];
        $empregado = $_POST["textEmpregado"];
        $credito = $_POST["textCredito"];

        try {
            $query = $pdo->prepare("INSERT INTO `cliente`(`numero`, `nome`, `num_empregado_asignado`, `limite_de_credito`) VALUES (?,?,?,?)");

            $query->execute(array($numero, $nome, $empregado, $credito));

            $mensaxe = "Rexistro completado con éxito";

        } catch (PDOException $e) {
            $mensaxe =  "Erro insertando" . $e->getMessage();
        }

        header("location:datos.php?mensaxe=$mensaxe");
        exit;

    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="engadeRexistro.php" method="POST">
        <input type="text" name="textNumero" placeholder="Numero"></br></br>
        <input type="text" name="textNome" placeholder="Nome"></br></br>
        <input type="text" name="textEmpregado" placeholder="Empregado asignado"></br></br>
        <input type="text" name="textCredito" placeholder="Límite de crédito"></br></br>

        <button type="submit" name="botonAgregar">Agregar</button>
    </form>

</body>
</html>