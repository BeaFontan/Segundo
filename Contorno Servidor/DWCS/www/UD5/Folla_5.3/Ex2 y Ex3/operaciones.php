<?php

require_once("Clases/Suma.php");
require_once("Clases/Resta.php");
require_once("Clases/Multiplicacion.php");


if (isset($_POST["btnCalcular"])) {
    $operando1 = (float) $_POST["txtOperando1"];
    $operando2 = (float) $_POST["txtOperando2"];
    $operacion = $_POST["selectOperacion"];

    if (strcmp($operacion, 'suma') == 0) {
        $operacion=new Suma();

    }elseif (strcmp($operacion, 'resta') == 0) {
        $operacion=new Resta();

    }else{
        $operacion=new Multiplicacion();
    }

    $operacion->setOperando1($operando1);
    $operacion->setOperando2($operando2);
    $operacion->calcular();
    echo "<p>".$operacion->getResultado()."</p>";

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
    <form action="" method="post">
        <input type="number" name="txtOperando1" ></br>
        <input type="number" name="txtOperando2" ></br>

        <select name="selectOperacion">
            <option value="suma">Sumar</option>
            <option value="resta">Restar</option>
            <option value="multiplicar">Multiplicar</option>
        </select>

        <button type="submit" name="btnCalcular">Calcular</button>
    </form>
</body>
</html>