<?php

require_once("vehiculo.php");
if (isset($_POST["btnGuardar"])) {

    $matricula = $_POST["txtMatricula"];
    $modelo = $_POST["txtModelo"];
    $km = $_POST["txtKm"];
    $vehículo = new Vehiculo($matricula, $modelo, $km);


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
    <form action="flotaVehiculos.php" method="post">
        <input type="text" name="txtMatricula" ></br>
        <input type="text" name="txtModelo" ></br>
        <input type="text" name="txtKm" ></br>
        <button type="submit" name="btnGuardar">Guardar</button>
    </form>
</body>
</html>