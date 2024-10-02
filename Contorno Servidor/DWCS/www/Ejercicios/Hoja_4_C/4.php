<?php


$viaxes = [
    array("Madrid", "Segovia", 90201),
    array("Madrid", "A Coruña", 596887),
    array("Barcelona", "Cádiz", 1152669),
    array("Bilbao", "Valencia", 622233),
    array("Sevilla", "Santander", 832067),
    array("Oviedo", "Badajoz", 682429)
];

$viaxeMaisLongo = $viaxes[0];

foreach ($viaxes as $viaxe) {
    if ($viaxe[2] > $viaxeMaisLongo[2]) {//accedo a la posición 2 porque empieza en cero para poder comparar los km
        $viaxeMaisLongo = $viaxe;
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Viaxes</title>
    <style>
        body{
            background-color: #000080;
        }
        table {
            width: 50%;
            margin: 20px auto;
            border-collapse: collapse;
            text-align: center;
            background-color: #000080;
            color: white;
        }
        th, td {
            border: 1px solid white;
            padding: 10px;
        }
        th {
            background-color: black;
        }
        h1 {
            text-align: center;
            color: yellow;
        }
        p {
            margin-top: 20px;
            text-align: center;
            color: white;
            font-weight: bold;
        }
    </style>
</head>
<body>
    <h1>Viaxe</h1>

    <table>
        <tr>
            <th>Orixe</th>
            <th>Destino</th>
            <th>Distancia (km)</th>
        </tr>

        <?php
            // Mostrar los datos de los viajes en la tabla
            foreach($viaxes as $viaxe) {
                $distancia_km = $viaxe[2] / 1000; //divido entre 1000 para pasar a metros

                echo "<tr>";
                echo "<td>{$viaxe[0]}</td>";
                echo "<td>{$viaxe[1]}</td>";
                echo "<td>{$distancia_km}</td>";
                echo "</tr>";
            }
        ?>
    </table>

    <?php
        //la distancia del trayecto más largo a kilómetros
        $distancia_mais_longa_km = $viaxeMaisLongo[2] / 1000;
    ?>
    
    <p>O traxecto máis longo é o de <?php echo "{$viaxeMaisLongo[0]} a {$viaxeMaisLongo[1]}"; ?> con <?php echo $distancia_mais_longa_km; ?> kms.</p>
</body>
</html>
