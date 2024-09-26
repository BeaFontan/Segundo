<?php

$viaxes = [
    array("Madrid", "Segovia", 90.201),
    array("Madrid", "A Coruña", 596.887),
    array("Barcelona", "Cádiz", 1152.669),
    array("Bilbao", "Valencia", 622.233),
    array("Sevilla", "Santander", 832.067),
    array("Oviedo", "Badajoz", 682.429)
];

$viaxeMaisLongo = $viaxes[0];

foreach ($viaxes as $viaxe) {
    if ($viaxe[2] > $viaxeMaisLongo) {
        $viaxeMaisLongo = $viaxe;
    }
}

echo "O traxecto máis longo é de {$viaxeMaisLongo[0]}  a {$viaxeMaisLongo[1]} con  {$viaxeMaisLongo[2]} kms.";

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Viaxe</h1>

    <table>
        <th>Orixe</th>
        <th>Destino</th>
        <th>Distancia en km</th>

        <?php

            foreach($viaxes as $viaxe)
            echo "<tr>";
            echo "<td> {$viaxe[0]}</td>";
            echo "<td> {$viaxe[1]}</td>";
            echo "<td> {$viaxe[2]}</td>";
            echo "</tr>";
        ?>
    </table>
</body>
</html>