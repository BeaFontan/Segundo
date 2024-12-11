<?php
include 'pinturas.php';

$totalFilas = count($pinturas);

function listadoCompleto($pinturas){
    return $pinturas;
}

function listarNomeAutor($pinturas){
    uasort($pinturas, function($a,$b){
        return strcasecmp($a[0], $b[0]);
    });

    return $pinturas;
}

function listarNomeTitulo($pinturas){
    uksort($pinturas, function($a, $b){
        return strcasecmp($a, $b);
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

function primLetraMayusTitulo($pinturas){
    foreach ($pinturas as $cuadro => $datos) {
        $cuadro = ucwords($cuadro);
        $arrayMod[$cuadro] = $datos;
    }

    return $arrayMod;
}

function terceraLetraMayusTitulo($pinturas){
    foreach ($pinturas as $cuadro => $datos) {
        if ($cuadro[2] == " ") {
            $cuadro[3] = strtoupper($cuadro[3]);
        }else{
            $cuadro[2] = strtoupper($cuadro[2]);
        }

        $arraMod[$cuadro] = $datos;
    }

    return $arraMod;
}

function eliminarEspazosTitulo($pinturas){
    foreach ($pinturas as $cuadro => $datos) {
       $cuadro = str_replace(" ", "", $cuadro);
       $arrayMod[$cuadro] = $datos;
    }

    return $arrayMod;
}

function cambiarOPorU($pinturas){
    foreach ($pinturas as $cuadro => $datos) {
        $cuadro = str_replace('o', 'u', $cuadro);
        $datos[0] = str_replace('o', 'u', $datos[0]);
        $arraMod[$cuadro] = $datos;
    }

    return $arraMod;
}

function buscar($pinturas){
    $arrayEncontrado = [];
    $palabraABuscar = strtolower($_GET["textBuscar"]);

    foreach ($pinturas as $cuadro => $datos) {
        $cuadroMinus = strtolower($cuadro);
        $tituloMinus = strtolower($datos[0]);

        if (str_contains($cuadroMinus, $palabraABuscar) || str_contains($tituloMinus, $palabraABuscar))  {
            $arrayEncontrado[$cuadro] = $datos;
        }
    }
    return $arrayEncontrado;
}

if ($_GET["boton"]) {
    switch ($_GET["boton"]) {
        case 'listarCompleto':
            $pinturas = listadoCompleto($pinturas);
            break;

        case 'listarNomeAutor':
            $pinturas = listarNomeAutor($pinturas);
            break;

        case 'listarNomeTitulo':
            $pinturas = listarNomeTitulo($pinturas);
            break;

        case 'listarCronoloxico':
            $pinturas = listarCronoloxico($pinturas);
            break;

        case 'listarModerna':
            $pinturas = listarModerna($pinturas);
            break;

        case 'primLetraMayusTitulo':
            $pinturas = primLetraMayusTitulo($pinturas);
            break;

        case 'terceraLetraMayusTitulo':
            $pinturas = terceraLetraMayusTitulo($pinturas);
            break;

        case 'eliminarEspazosTitulo':
            $pinturas = eliminarEspazosTitulo($pinturas);
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
    <form action="I6.php" method="GET">
        <button type="submit" name="boton" value="listarCompleto">Listado Completo</button></br></br>
        <button type="submit" name="boton" value="listarNomeAutor">Ordenado polo nome do autor</button></br></br>
        <button type="submit" name="boton" value="listarNomeTitulo">Ordenar o listado polo nome do título</button></br></br>
        <button type="submit" name="boton" value="listarCronoloxico">Ordena as pinturas cronoloxicamente</button></br></br>
        <button type="submit" name="boton" value="listarModerna">Ordena as pinturas desde a máis moderna á máis antiga.</button></br></br>
        <button type="submit" name="boton" value="primLetraMayusTitulo">Pasa a maiúscula a primeira letra de cada palabra do título</button></br></br>
        <button type="submit" name="boton" value="terceraLetraMayusTitulo">Pasa a maiúscula a terceira letra do título</button></br></br>
        <button type="submit" name="boton" value="eliminarEspazosTitulo">Elimina os espazos dos títulos</button></br></br>
        <button type="submit" name="boton" value="cambiarOPorU">Cambia a letra ‘o’ pola letra ‘u’ de todos os datos</button></br></br>

        <input type="text" name="textBuscar" placeholder="Introduce a palabra">
        <button type="submit" name="boton" value="buscar">Busca unha palabra tanto no título como no autor</button></br></br>

    </form>
    <table>
        <tr>
            <th>Título</th>
            <th>Autor</th>
            <th>Año</th>
        </tr>
        <?php
            if (!empty($pinturas)) {
                $cuenta = 0;

                foreach ($pinturas as $cuadro => $datos) {
                    echo "<tr>
                            <td>$cuadro</td>
                            <td>{$datos[0]}</td>
                            <td>{$datos[1]}</td>
                        </tr>";
                    
                    $cuenta+=1;
                }
            }else{
                echo "<p>No se han encontrado resultados</p>";
            }

        ?>
    </table>

    <p><?php
        echo "Mostrados $cuenta filas de un total de $totalFilas"; 
    ?></p>
</body>
</html>