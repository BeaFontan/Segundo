<?php
$elementos = [
    "alcalinos" => [
        ["Li" => 3],
        ["Na" => 11],
        ["K" => 19],
        ["Rb" => 37],
        ["Cs" => 55],
        ["Fr" => 87]
    ], 
    "alcalinoTerreos" => [
        ["Be" => 4],
        ["Mg" => 12],
        ["Ca" => 20],
        ["Sr" => 38],
        ["Ba" => 56],
        ["Ra" => 88],
    ],
    "terreos" => [
        ["B" => 5],
        ["Al" => 13],
        ["Ga" => 31],
        ["In" => 49],
        ["Tl" => 81]
    ]
];

$seleccion = $_POST['grupo'];


switch ($seleccion) {
    case 'alcalinos':
        $arrayElementos = $elementos['alcalinos'];
        $total = count($arrayElementos);
        $seleccion = "Alcalinos";
        break;

    case 'alcalinoTerreos':
        $arrayElementos = $elementos['alcalinoTerreos'];
        $total = count($arrayElementos);
        $seleccion = "Alcalino Térreos";

        break;

    case 'terreos':
        $arrayElementos = $elementos['terreos'];
        $total = count($arrayElementos);
        $seleccion = "Térreos";
        
        break;

    default:
        echo "No se ha seleccionado nada";
        break;
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
    <h1>Táboa Periódica dos Elementos</h1>
    <p>O grupo <?php echo $seleccion?> está formado por los seguintes elementos </p>
    <table>
        <tr>
            <th>Nombre</th>
            <th>Nº atómico</th>
        </tr>

        <?php
        foreach($arrayElementos as $elemento) {
            foreach($elemento as $nombre => $numeroAtomico) {
                echo "<tr>
                        <td>{$nombre}</td>
                        <td>{$numeroAtomico}</td>
                      </tr>";
            }
        }
        ?>

    </table>

    <p>O grupo <?php echo $total?> está formado por los seguintes elementos </p>

    <form action="5.html" method="get">
    <button type="submit" class="boton">Volver atrás</button>
</form>
    
</body>
</html>

