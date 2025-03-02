<?php

include 'pinturas.php';

$totalFilas = count($pinturas);

function listadoNombreAutor($pinturas) {
    uasort(
        $pinturas, function ($a, $b) {
           return strcmp($a[0], $b[0]);
        }
    );

    return $pinturas;
}

function listadotitulo ($pinturas) {
    uksort(
        $pinturas, function($a,$b) {
            return strcmp($a, $b);
        }
    );

    return $pinturas;
}

function listadoCrono($pinturas) {
    uasort(
        $pinturas, function($a,$b){
            return $a[1] <=> $b[1];
        }
    );
    
    return $pinturas;
}

function listadoModernas($pinturas) {
    uasort(
        $pinturas, function ($a, $b) {
            return $b[1] <=> $a[1];
        }
    );

    return $pinturas;
}

function mayusculaTitulo($pinturas) {
    $pinturasMod = [];

    foreach ($pinturas as $cuadro => $datos) {
        $nuevoCuadro = ucwords($cuadro); 
        $pinturasMod[$nuevoCuadro] = $datos;
    }

    $pinturas = $pinturasMod;

    return $pinturas;
}

function maysculaTerceraLetra($pinturas) {
    $arrayMod = [];

    foreach ($pinturas as $cuadro => $datos) {
        $cuadro[2] = strtoupper($cuadro[2]);//ojo es el array del string como tal, no es posición de array
        $arrayMod[$cuadro] = $datos;
    }
    
    $pinturas = $arrayMod;

    return $pinturas;
}

function eliminarEspacios($pinturas) {
    $arraMod = [];

    foreach ($pinturas as $cuadro => $datos) {
        $nuevoCuadro = str_replace(" ", "", $cuadro);
        $arraMod[$nuevoCuadro] = $datos;
    }

    $pinturas = $arraMod;

    return $pinturas;
}

function cambiarLetras($pinturas) {
    $arraMod = [];

    foreach ($pinturas as $cuadro => $datos) {
        $cuadroMod =  str_replace('o', 'u', $cuadro);
        $autorMod = str_replace('o', 'u', $datos[0]);
        $datos[0] = $autorMod;

        $arraMod[$cuadroMod] = $datos;
    }

    $pinturas = $arraMod;

    return $pinturas;
}

function buscar($pinturas, $palabra) {
    $arrayEntontrado = [];

    foreach ($pinturas as $cuadro => $datos) {
        if (str_contains($cuadro, $palabra) || str_contains($datos[0], $palabra)) {
            $arrayEntontrado[$cuadro] = $datos;
        }
    }

    return $pinturas = $arrayEntontrado;
}

if (isset($_GET["boton"])) {
    switch ($_GET["boton"]) {
        case 'Listado Completo':
            $pinturas;
            break;
        
        case 'Ordenado polo nome do autor':
            $pinturas = listadoNombreAutor($pinturas);
            break;

        case 'Ordenar o listado polo nome do título':
            $pinturas = listadotitulo($pinturas);
            break;

        case 'Ordena as pinturas cronoloxicamente':
            $pinturas = listadoCrono($pinturas);
            break;   

        case 'Ordena as pinturas desde a máis moderna á máis antiga.':
            $pinturas = listadoModernas($pinturas);
            break;  

        case 'Pasa a maiúscula a primeira letra de cada palabra do título':
            $pinturas = mayusculaTitulo($pinturas);
            break;  

        case 'Pasa a maiúscula a terceira letra do título':
            $pinturas = maysculaTerceraLetra($pinturas);
            break;  

        case 'Elimina os espazos dos títulos':
            $pinturas = eliminarEspacios($pinturas);
            break;  

        case 'Cambia a letra ‘o’ pola letra ‘u’ de todos os datos':
            $pinturas = cambiarLetras($pinturas);
            break; 
            
        case 'Busca unha palabra tanto no título como no autor':
            $palabra = $_GET["textoBuscar"];
            $pinturas = buscar($pinturas, $palabra);

            if (empty($pinturas)) {
                $palabraNoEncontrada = "No se han encontrado resultados";
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
    <style>
        table{
            border-collapse: collapse;
            text-align: center;
        }

        td{
            width: 400px;
            height: 20px;
            border: 1px black solid;
        }

        th{
            background-color: black;
            color: white;
        }
    </style>
</head>
<body>
    <form action="2.php" method="GET">
    <input type="submit" name="boton" value="Listado Completo"></br></br>
    <input type="submit" name="boton" value="Ordenado polo nome do autor"></br></br>
    <input type="submit" name="boton" value="Ordenar o listado polo nome do título"></br></br>
    <input type="submit" name="boton" value="Ordena as pinturas cronoloxicamente"></br></br>
    <input type="submit" name="boton" value="Ordena as pinturas desde a máis moderna á máis antiga."></br></br>
    <input type="submit" name="boton" value="Pasa a maiúscula a primeira letra de cada palabra do título"></br></br>
    <input type="submit" name="boton" value="Pasa a maiúscula a terceira letra do título"></br></br>
    <input type="submit" name="boton" value="Elimina os espazos dos títulos"></br></br>
    <input type="submit" name="boton" value="Cambia a letra ‘o’ pola letra ‘u’ de todos os datos"></br></br>

    <input type="text" name="textoBuscar">
    <input type="submit" name="boton" value="Busca unha palabra tanto no título como no autor"></br></br>
    </form>

    <table>
        <tr>
            <th>pintura</th>
            <th>autor</th>
            <th>año</th>
        </tr>
        <?php
        $cuenta= 0;

        if (!empty($palabraNoEncontrada)) {
            echo $palabraNoEncontrada;
        } else {
            foreach ($pinturas as $cuadro=>$datos) {
                echo "<tr>
                        <td>$cuadro</td>
                        <td>$datos[0]</td>
                        <td>$datos[1]</td>
                    </tr>";
                $cuenta +=1;
            }
        }
        ?>
    </table>
    <?php echo "<p>Mostrados "  . $cuenta . " de un total de " . $totalFilas ."</p>";?>
</body>
</html>