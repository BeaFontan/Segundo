<?php

include 'pinturas.php';

$totalFilas = count($pinturas);

function listarTodos($pinturas){
    return $pinturas;
}

function listarNomeAutor($pinturas){
    uasort($pinturas, function($a,$b){
        return strcmp($a[0],$b[0]);
    });

    return $pinturas;
}

function listarPorTitulo($pinturas){
   // ksort($pinturas);

    uksort($pinturas, function($a,$b){
        return strcasecmp($a,$b);
    });

    return $pinturas;
}

function listarCronoloxico($pinturas){
    uasort($pinturas, function($a, $b){
        return $a[1] <=> $b[1];
    });

    return $pinturas;
}

function listarModerna($pinturas){
    uasort($pinturas, function($a, $b){
        return $b[1] <=> $a[1];
    });

    return $pinturas;
}

function tituloPrimeraLetraMayus($pinturas){
    foreach ($pinturas as $cuadro => $datos) {
        $tituloMod = ucwords($cuadro);
        $arraMod[$tituloMod] = $datos;
    }

    return $arraMod;
}

function tituloTerceraLetraMayus($pinturas){
    foreach ($pinturas as $cuadro => $datos) {
        if ($cuadro[2] == " ") {
            $cuadro[3] = strtoupper($cuadro[3]);
        }else {
            $cuadro[2] = strtoupper($cuadro[2]);
        }

        $arrayMod[$cuadro]=$datos;
    }

    return $arrayMod;
}

function eliminarEspaciosTitulo($pinturas){
    foreach ($pinturas as $cuadro => $datos) {
        $tituloMod = str_replace(" ", "", $cuadro);
        $arrayMod[$tituloMod] = $datos;
    }
    return $arrayMod;
}

function cambiarOPorU($pinturas){
    foreach ($pinturas as $cuadro => $datos) {
        $tituloMod = str_replace("o", "u", $cuadro);
        $datos[0] = str_replace("o", "u", $datos[0]);
        $arrayMod[$tituloMod]=$datos;
    }
    return $arrayMod;
}

function buscar($pinturas){
    $arrayEncontrado = [];
    $palabraABuscar = strtolower($_GET["textBuscar"]);

    foreach ($pinturas as $cuadro => $datos) {
        $tituloMinus = strtolower($cuadro);
        $autorMinus = strtolower($datos[0]);
        if (str_contains($tituloMinus, $palabraABuscar) || str_contains($autorMinus, $palabraABuscar) ) {
            $arrayEncontrado[$cuadro]=$datos;
        }
    }

    return $arrayEncontrado;
}

if (isset($_GET["boton"])) {
    switch ($_GET["boton"]) {
        case 'listarTodos':
            $pinturas = listarTodos($pinturas);
            break;

        case 'listarNomeAutor':
            $pinturas = listarNomeAutor($pinturas);
            break;

        case 'listarPorTitulo':
            $pinturas = listarPorTitulo($pinturas);
            break;

        case 'listarCronoloxico':
            $pinturas = listarCronoloxico($pinturas);
            break;

        case 'listarModerna':
            $pinturas = listarModerna($pinturas);
            break;

        case 'tituloPrimeraLetraMayus':
            $pinturas = tituloPrimeraLetraMayus($pinturas);
            break;

        case 'tituloTerceraLetraMayus':
            $pinturas = tituloTerceraLetraMayus($pinturas);
            break;

        case 'eliminarEspaciosTitulo':
            $pinturas = eliminarEspaciosTitulo($pinturas);
            break;

        case 'cambiarOPorU':
            $pinturas = cambiarOPorU($pinturas);
            break;

        case 'buscar':
            $pinturas = buscar($pinturas);
            break;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        img{
            width: 500px;
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

<img src="monaLisa.webp" alt="mola lisa">

<form action="I5.php" method="GET">
    <button type="submit" name="boton" value="listarTodos">Listado completo</button></br></br></br>
    <button type="submit" name="boton" value="listarNomeAutor">Ordenado polo nome do autor</button></br></br></br>
    <button type="submit" name="boton" value="listarPorTitulo">Ordenar o listado polo nome do título</button></br></br></br>
    <button type="submit" name="boton" value="listarCronoloxico">Ordena as pinturas cronoloxicamente</button></br></br></br>
    <button type="submit" name="boton" value="listarModerna">Ordena as pinturas desde a máis moderna á máis antiga.</button></br></br></br>
    <button type="submit" name="boton" value="tituloPrimeraLetraMayus">Pasa a maiúscula a primeira letra de cada palabra do título</button></br></br></br>
    <button type="submit" name="boton" value="tituloTerceraLetraMayus">Pasa a maiúscula a terceira letra do título</button></br></br></br>
    <button type="submit" name="boton" value="eliminarEspaciosTitulo">Elimina os espazos dos títulos</button></br></br></br>
    <button type="submit" name="boton" value="cambiarOPorU">Cambia a letra ‘o’ pola letra ‘u’ de todos os datos</button></br></br></br>
    <button type="submit" name="boton" value="cambiarOPorU">Cambia a letra ‘o’ pola letra ‘u’ de todos os datos</button></br></br></br>
    <input type="text" name="textBuscar" placeholder="Introduce a palabra a buscar">
    <button type="submit" name="boton" value="buscar">Busca unha palabra tanto no título como no autor</button></br></br></br>
</form>

<table>
    <tr>
        <th>Título</th>
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
                
                $cuenta+=1;
            }
        }
    ?>
</table>

<?php 
    echo "<p>Mostradas {$cuenta} de un total de {$totalFilas}</p>";
?>
</body>
</html>