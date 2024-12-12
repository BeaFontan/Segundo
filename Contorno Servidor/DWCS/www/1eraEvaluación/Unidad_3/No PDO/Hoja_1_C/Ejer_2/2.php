<?php

$conexion = mysqli_connect("dbXdebug", "root", "root", "ejer2");

/*
$trayectos = [
    ['Madrid', 'Segovia', 90201],
    ['Madrid', 'A Coruña', 596887],
    ['Barcelona', 'Cádiz', 1152669],
    ['Bilbao', 'Valencia', 622233],
    ['Sevilla', 'Santander', 832067],
    ['Oviedo', 'Badajoz', 682429],
];

    if ($conexion) {
        mysqli_set_charset($conexion, 'utf8');

        foreach ($trayectos as $trayecto) {
           $inserccion =  mysqli_query($conexion, "Insert into traxectos values ('{$trayecto[0]}', '{$trayecto[1]}', {$trayecto[2]})");
        }

        echo "entrou";
    }
    */
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<form action="2.php" method="GET">
    <input type="submit" name="boton" value="Orixe ascendente">
    <input type="submit" name="boton" value="Orixe descendente">
    <input type="submit" name="boton" value="Destino ascendente">
    <input type="submit" name="boton" value="Destino descendente">
    <input type="submit" name="boton" value="Distancia mayor">
    <input type="submit" name="boton" value="Distancia menor">

    <?php

        $accion = $_GET["boton"];

        switch ($accion) {
            case 'Orixe ascendente':
                
                $query = "SELECT * FROM `traxectos` ORDER by orixe asc;";
                break;
            case 'Orixe descendente':
                $query = "SELECT * FROM `traxectos` ORDER by orixe desc;";
                break;
            case 'Destino ascendente':
                $query = "SELECT * FROM `traxectos` ORDER by destino asc;";
                break;
            case 'Destino descendente':
                $query = "SELECT * FROM `traxectos` ORDER by destino desc;";
                break;            
            case 'Distancia mayor':
                $query = "SELECT * FROM `traxectos` ORDER by distancia desc;";
                break;            
            case 'Distancia menor':
                $query = "SELECT * FROM `traxectos` ORDER by distancia asc;";
                break;                
        }

        if ($conexion) {
            $resultado = mysqli_query($conexion, $query);
        }
    ?>
</form>

<table>
    <tr>
        <th>orixe</th>
        <th>destino</th>
        <th>distancia</th>
    </tr>
    <?php
    while ($fila = mysqli_fetch_array($resultado)) {
        echo "<tr>
        <td>{$fila["orixe"]}</td>
        <td>{$fila["destino"]}</td>
        <td>{$fila["distancia"]}</td>
        </tr>";
    }
    ?>
</table>

</body>
</html>