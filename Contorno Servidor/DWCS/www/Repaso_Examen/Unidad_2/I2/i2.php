<?php

include 'pinturas.php';

$totalFilas = count($pinturas);

function ordenarAutor($pinturas){
    uasort(
        $pinturas, function($a, $b){
           return strcmp($a[0], $b[0]);
        });

    return $pinturas;
}

function ordenarTitulo($pinturas) {
    uksort($pinturas, function($a, $b) {
        return strcmp($a, $b);
    });

    return $pinturas;
}

function ordenarCronoloxico($pinturas) {
    uasort($pinturas, function($a, $b){
        return $a[1] <=> $b[1];
    });

    return $pinturas;
}

function OrdenarModerna($pinturas){
    uasort($pinturas, function($a, $b){
        return $b[1] <=> $a[1];
    });

    return $pinturas;
}

function mayusculaTituloPrimera($pinturas) {
    $arrayMod = [];
    foreach ($pinturas as $cuadro => $datos) {
        $cuadro = ucwords($cuadro);
        $arrayMod[$cuadro] = $datos;
    }
    $pinturas = $arrayMod;

    return $pinturas;
}

function mayusculaTituloTercera($pinturas){
    $arrayMod = [];
    foreach ($pinturas as $cuadro => $datos) {
        if ($cuadro[2] == " ") {
            $cuadro[3] = strtoupper($cuadro[3]);
            $arrayMod[$cuadro] = $datos;
        }else {
            $cuadro[2] = strtoupper($cuadro[2]);
            $arrayMod[$cuadro] = $datos;
        }
    }
    $pinturas = $arrayMod;

    return $pinturas;
}

function eliminarEspaciosTitulo($pinturas){
    $arrayMod = [];
    foreach ($pinturas as $cuadro => $datos) {
        $cuadro = str_replace(" ", "", $cuadro);
        $arrayMod[$cuadro] = $datos;
    }
    $pinturas = $arrayMod;

    return $pinturas;
}

function cambiarOPorU($pinturas){
    $arrayMod = [];

    foreach ($pinturas as $cuadro => $datos) {
        $cuadro = str_replace('o', 'u', $cuadro);
        $datos[0] = str_replace('o', 'u', $datos[0]);
        $arrayMod[$cuadro] = $datos;
    }
    $pinturas = $arrayMod;

    return $pinturas;
}

function buscarPalabra($pinturas){
    $arrayEntontrado = [];
    $palabra = $_GET["textBuscar"];

    foreach ($pinturas as $cuadro => $datos) {
        if (str_contains($cuadro, $palabra) || str_contains($datos[0], $palabra)) {
            $arrayEntontrado[$cuadro] = $datos;
        }
    }
    $pinturas = $arrayEntontrado;

    return $pinturas;
}

if (isset($_GET["boton"])) {
    switch ($_GET["boton"]) {
        case 'listar':
            $pinturas; 
            break;
        
        case 'ordenarNomeAutor':
            $pinturas = ordenarAutor($pinturas);
            break;

        case'ordenarTitulo':
            $pinturas = ordenarTitulo($pinturas);

            break;
        case 'ordenarCronoloxico':
            $pinturas = ordenarCronoloxico($pinturas);
            break;
        
        case 'ordenarModerna':
            $pinturas = OrdenarModerna($pinturas);
            break;
        
        case 'mayusculaTituloPrimera':
            $pinturas = mayusculaTituloPrimera($pinturas);
            break;

        case 'mayusculaTituloTercera':
            $pinturas = mayusculaTituloTercera($pinturas);
            break;

        case'eliminarEspaciosTitulo':
            $pinturas = eliminarEspaciosTitulo($pinturas);
            break;
        
        case 'cambiarOPorU':
            $pinturas = cambiarOPorU($pinturas);
            break;
        case 'buscarPalabra':
            $pinturas = buscarPalabra($pinturas);

            if (empty($pinturas)) {
                $mensaje = "No se han encontrado resultados.";
            }
            break;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=, initial-scale=1.0">
    <title>Document</title>
    <style>
        img{
            width: 800px;
            height: 300px;
        }
        table{
            border-collapse: collapse;
        }
        tr, td{
            border: 1px black solid;
            width: 1000px;
            text-align: center;
        }
        th{
            border: 1px black solid;
            color: white;
            background-color: black;
        }
    </style>
</head>
<body>
    <img src="monaLisa.webp" alt="monaLisa"></br></br>
    <form action="i2.php" method="GET">
        <button type="submit" name="boton" value="listar">Listado Completo</button>
        <button type="submit" name="boton" value="ordenarNomeAutor">Ordenar polo nome do autor</button>
        <button type="submit" name="boton" value="ordenarTitulo">Ordenar polo nome do título</button>
        <button type="submit" name="boton" value="ordenarCronoloxico">Ordenar cronolóxicamente</button>
        <button type="submit" name="boton" value="ordenarModerna">Ordenar mais moderna</button>
        <button type="submit" name="boton" value="mayusculaTituloPrimera">Pasa a maiúscula a primeira letra de cada palabra do título</button>
        <button type="submit" name="boton" value="mayusculaTituloTercera">Pasa a maiúscula a terceira letra de cada palabra do título</button>
        <button type="submit" name="boton" value="eliminarEspaciosTitulo">Elimina os espazos dos títulos</button>
        <button type="submit" name="boton" value="cambiarOPorU">Cambia a letra ‘o’ pola letra ‘u’ de todos os datos</button>
        <input type="text" name="textBuscar" placeholder="Introduce la palabra a buscar">
        <button type="submit" name="boton" value="buscarPalabra">Buscar</button>
    </form>
    <hr>
    <table>
        <tr>
            <th>Pintura</th>
            <th>Autor</th>
            <th>Año</th>
        </tr>
        <?php
        $cuenta = 0;
        if (!empty($pinturas)) {
            foreach ($pinturas as $cuadro => $datos) {
                echo "<tr>
                        <td>$cuadro</td>
                        <td>$datos[0]</td>
                        <td>$datos[1]</td>
                    </tr>";
                $cuenta += 1;
            }
        }else{
            echo $mensaje;
        }
        ?>
    </table>

    <?php echo "<p>Mostrados " . $cuenta . " de un total de " . $totalFilas . "</p>";?>
</body>
</html>