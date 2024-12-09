<?php
include 'pinturas.php';

$totalFilas = count($pinturas);

function listarTodos($pinturas) {
   return $pinturas;
}

function ordenarAutor($pinturas) {
    uasort($pinturas, function($a, $b){
        return strcmp($a[0], $b[0]);
    });

    return $pinturas;
}

function ordenarTitulo($pinturas){
    uksort($pinturas, function($a,$b){
        return strcmp($a,$b);
    });
    
    return $pinturas;
}

function ordenarCronoloxico($pinturas){
    uasort($pinturas, function($a,$b){
        return $a[1] <=> $b[1];
    });

    return $pinturas;
}

function ordenarModerna($pinturas){
    uasort($pinturas, function($a,$b){
        return $b[1] <=> $a[1];
    });

    return $pinturas;
}

function pasarMayusPrimeiraLetraTitulo($pinturas){
    $arrayMod = [];

    foreach ($pinturas as $cuadro => $datos) {
        $nuevoTitulo = ucwords($cuadro);
        $arrayMod[$nuevoTitulo] = $datos;
    }
    
    return $pinturas = $arrayMod;
}

function pasarMayusTerceraLetraTitulo($pinturas){
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

    return $pinturas = $arrayMod;
}

function eliminarEspaciosTitulo($pinturas){
    $arrayMod = [];

    foreach ($pinturas as $cuadro => $datos) {
        $nuevoTitulo = str_replace(" ", "", $cuadro);
        $arrayMod[$nuevoTitulo]=$datos;
    }

    return $pinturas = $arrayMod;
}

function cambiarLetraOpoU($pinturas){
    $arrayMod = [];

    foreach ($pinturas as $cuadro => $datos) {
        $nuevoTitulo = str_replace("o", "u", $cuadro);
        $datos[0] = str_replace("o", "u", $datos[0]);
        $arrayMod[$nuevoTitulo]=$datos;
    }

    return $pinturas = $arrayMod;
}

function buscar($pinturas){
    $arrayEncontrado = [];
    $palabra = $_GET["textBuscar"];

    foreach ($pinturas as $cuadro => $datos) {
        $cuadrominus = strtolower($cuadro);
        $datosminus = strtolower($datos[0]);
        $palabraminus =strtolower($palabra);
        if (str_contains($cuadrominus, $palabraminus) || str_contains($datosminus, $palabraminus)) {
            $arrayEncontrado[$cuadro]=$datos;
        }
    }

    return $pinturas = $arrayEncontrado;
}

if (isset($_GET["boton"])) {
    switch ($_GET["boton"]) {
        case 'listarTodos':
            $pinturas = listarTodos($pinturas);
            break;

        case 'ordenarAutor':
            $pinturas = ordenarAutor($pinturas);
            break;
        
        case 'ordenarTitulo':
            $pinturas = ordenarTitulo($pinturas);
            break;

        case 'ordenarCronoloxico':
            $pinturas = ordenarCronoloxico($pinturas);
            break;
        
        case 'ordenarModerna':
            $pinturas = ordenarModerna($pinturas);
            break;

        case 'pasarMayusPrimeiraLetraTitulo':
            $pinturas = pasarMayusPrimeiraLetraTitulo($pinturas);
            break;
        
        case 'pasarMayusTerceraLetraTitulo':
            $pinturas = pasarMayusTerceraLetraTitulo($pinturas);
            break;

        case 'eliminarEspaciosTitulo':
            $pinturas = eliminarEspaciosTitulo($pinturas);
            break;

        case 'cambiarLetraOpoU':
            $pinturas = cambiarLetraOpoU($pinturas);
            break;

        case 'buscar':
            $pinturas = buscar($pinturas);
            if (empty($pinturas)) {
                $mensaje = "<p>No se han encontrado resultados</p>";
            }
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
</head>
<body>

<form action="I3.php" method="GET">
    <button type="submit" name="boton" value="listarTodos">Listar todos</button><br><br><br>
    <button type="submit" name="boton" value="ordenarAutor">Ordenado polo nome do autor</button><br><br><br>
    <button type="submit" name="boton" value="ordenarTitulo">Ordenar o listado polo nome do título</button><br><br><br>
    <button type="submit" name="boton" value="ordenarCronoloxico">Ordena as pinturas cronoloxicament</button><br><br><br>
    <button type="submit" name="boton" value="ordenarModerna">Ordena as pinturas desde a máis moderna á máis antiga.</button><br><br><br>
    <button type="submit" name="boton" value="pasarMayusPrimeiraLetraTitulo">Pasa a maiúscula a primeira letra de cada palabra do título</button><br><br><br>
    <button type="submit" name="boton" value="pasarMayusTerceraLetraTitulo">Pasa a maiúscula a terceira letra do título</button><br><br><br>
    <button type="submit" name="boton" value="eliminarEspaciosTitulo">Elimina os espazos dos títulos</button><br><br><br>
    <button type="submit" name="boton" value="cambiarLetraOpoU">Cambia a letra ‘o’ pola letra ‘u’ de todos os datos</button><br><br><br>
    <input type="text" name="textBuscar" placeholder="Introduce a palabra a buscar">
    <button type="submit" name="boton" value="buscar">Buscar</button><br><br><br>
</form>

<table>
    <tr>
        <th>Título</th>
        <th>Autor</th>
        <th>Año</th>
    </tr>
    <tr>
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
        }else{
            echo $mensaje;
        }
        ?>
    </tr>
</table>
<?php echo "<p>Mostrados $cuenta  de un total de $totalFilas</p>";?>

</body>
</html>