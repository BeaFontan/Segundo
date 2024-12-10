<?php
    include 'pinturas.php';
    
    $totalFilas = count($pinturas);

    function listar($pinturas){
        return $pinturas;
    }

    function listarNomeAutor($pinturas){
        uasort($pinturas, function($a,$b){
            return strcmp($a[0],$b[0]);
        });

        return $pinturas;
    }

    function listarTitulo($pinturas){
        ksort($pinturas);
        return $pinturas;
    }

    function listarCronoloxico($pinturas){
        uasort($pinturas, function($a,$b){
            return $a[1] <=> $b[1];
        });

        return $pinturas;
    }

    function listarModerna($pinturas){
        uasort($pinturas, function($a,$b){
            return $b[1] <=> $a[1];
        });

        return $pinturas;
    }

    function mayusPrimeraLetraTitulo($pinturas){
        foreach ($pinturas as $cuadro => $datos) {
            $tituloMod = ucwords($cuadro);
            $arrayMod[$tituloMod]=$datos;
        }

        return $arrayMod;
    }

    function mayusTerceraLetraTitulo($pinturas){
        foreach ($pinturas as $cuadro => $datos) {
            if ($cuadro[2] == " ") {
                $cuadro[3] = strtoupper($cuadro[3]);
            }else {
                $cuadro[2] = strtoupper($cuadro[2]);
            }

            $arrayMod[$cuadro] = $datos;
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
            $tituloMod = str_replace("o","u", $cuadro);
            $datos[0] = str_replace("o","u", $datos[0]);
            $arrayMod[$tituloMod] = $datos;
        }
        return $arrayMod;
    }

    function buscar($pinturas){
        $arrayEncontrado = [];
        $palabraABuscar = strtolower($_GET["textBuscar"]);

        foreach ($pinturas as $cuadro => $datos) {
            $tituloMinus = strtolower($cuadro);
            $autorMinus = strtolower($datos[0]);
            if (str_contains($tituloMinus, $palabraABuscar) || str_contains($autorMinus, $palabraABuscar)) {
                $arrayEncontrado[$cuadro]=$datos;
            }
        }

        return $arrayEncontrado;
    }

    if (isset($_GET["boton"])) {
        switch ($_GET["boton"]) {
            case 'listar':
                $pinturas = listar($pinturas);
                break;

            case 'listarNomeAutor':
                $pinturas = listarNomeAutor($pinturas);
                break;
            
            case 'listarTitulo':
                $pinturas = listarTitulo($pinturas);
                break;
            case 'listarCronoloxico':
                $pinturas = listarCronoloxico($pinturas);
                break;

            case 'listarModerna':
                $pinturas = listarModerna($pinturas);
                break;

            case 'mayusPrimeraLetraTitulo':
                $pinturas = mayusPrimeraLetraTitulo($pinturas);
                break;

            case 'mayusTerceraLetraTitulo':
                $pinturas = mayusTerceraLetraTitulo($pinturas);
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
    <form action="I4.php" method="GET">
        <button type="submit" name="boton" value="listar">Listar todos</button></br></br></br>
        <button type="submit" name="boton" value="listarNomeAutor">Listar polo nome de autor</button></br></br></br>
        <button type="submit" name="boton" value="listarTitulo">Listar polo título</button></br></br></br>
        <button type="submit" name="boton" value="listarCronoloxico">Listar cronoloxico</button></br></br></br>
        <button type="submit" name="boton" value="listarModerna">Listar mais moderna a antigua</button></br></br></br>
        <button type="submit" name="boton" value="mayusPrimeraLetraTitulo">Pasa a maiúscula a primeira letra de cada palabra do título</button></br></br></br>
        <button type="submit" name="boton" value="mayusTerceraLetraTitulo">Pasa a maiúscula a terceira letra do título</button></br></br></br>
        <button type="submit" name="boton" value="eliminarEspaciosTitulo">Elimina os espazos dos títulos</button></br></br></br>
        <button type="submit" name="boton" value="cambiarOPorU">Cambia a letra ‘o’ pola letra ‘u’ de todos os datos</button></br></br></br>

        <input type="text" name="textBuscar" placeholder="Introduce a palabra a buscar">
        <button type="submit" name="boton" value="buscar">Busca unha palabra tanto no título como no autor</button></br></br></br>
    </form>

<table>
    <tr>
        <th>Titulo</th>
        <th>Autor</th>
        <th>Año</th>
    </tr>
    <?php
    $cuenta = 0;
    if (!empty($pinturas)) {
        foreach ($pinturas as $cuadro => $datos) {
            echo "<tr>
                <td>{$cuadro}</td>
                <td>{$datos[0]}</td>
                <td>{$datos[1]}</td>
                </tr>";
            
            $cuenta +=1;
        }
    }else{
        echo "<p>No se han encontrado resultados</p>";  
    }
    ?>
</table>
<?php
echo "<p>Mostrados {$cuenta} de un total de {$totalFilas}</p>";
?>
</body>
</html>