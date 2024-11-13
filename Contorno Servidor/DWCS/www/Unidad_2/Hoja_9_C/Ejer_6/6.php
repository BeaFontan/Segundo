<!DOCTYPE html>
<html lang="gl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
        
    <form action="6.php" method="GET">

        <input type="submit" id="buscar" name="boton" value="Ordenar alfabéticamente polo nome da orixe">
        </br>

        <input type="submit" id="buscar" name="boton" value="Ordenar alfabéticamente polo nome da orixe descendente">
        </br>

        <input type="submit" id="buscar" name="boton" value="Ordenar alfabéticamente polo nome do destino">
        </br>

        <input type="submit" id="buscar" name="boton" value="Ordenar alfabéticamente polo nome do destino descendente">
        </br>

        <input type="submit" id="buscar" name="boton" value="Ordenar pola distancia de maior a menor">
        </br>

        <input type="submit" id="buscar" name="boton" value="Ordenar pola distancia de menor a maior">
        </br>
    </form>

    <?php
    // Definición del array de viajes
    $viaxes = [
        ["Madrid", "Segovia", 90201],
        ["Madrid", "A Coruña", 596887],
        ["Barcelona", "Cádiz", 1152669],
        ["Bilbao", "Valencia", 622233],
        ["Sevilla", "Santander", 832067],
        ["Oviedo", "Badajoz", 682429],
    ];

    if (isset($_GET["boton"])) {
        $boton = $_GET["boton"];

        switch ($boton) {
            case 'Ordenar alfabéticamente polo nome da orixe':
                usort($viaxes, function ($a, $b) {
                    return strcmp($a[0], $b[0]);
                });
                break;

            case 'Ordenar alfabéticamente polo nome da orixe descendente':
                usort($viaxes, function ($a, $b) {
                    return strcmp($b[0], $a[0]);
                });
                break;

            case 'Ordenar alfabéticamente polo nome do destino':
                usort($viaxes, function ($a, $b) {
                    return strcmp($a[1], $b[1]);
                });
                break;

            case 'Ordenar alfabéticamente polo nome do destino descendente':
                usort($viaxes, function ($a, $b) {
                    return strcmp($b[1], $a[1]);
                });
                break;

            case 'Ordenar pola distancia de maior a menor':
                usort($viaxes, function ($a, $b) {
                    return $b[2] - $a[2];
                });
                break;

            case 'Ordenar pola distancia de menor a maior':
                usort($viaxes, function ($a, $b) {
                    return $a[2] - $b[2];
                });
                break;
        }

        // Mostrar los resultados
        foreach ($viaxes as $viaxe) {
            echo "{$viaxe[0]} -> {$viaxe[1]} -> {$viaxe[2]} </br>";
        }
    }
    ?>

</body>

</html>
