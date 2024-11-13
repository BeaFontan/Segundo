<?php
//EL EJERCICIO ESTÁ HECHO DE AQUELLA MANERA, FALTAN UNAS MIERDAS DE ELIMINAR Y BORRAR QUE LLEVAN A OTRO FORMULARIO, PERO NO VÍ.

$conexion = mysqli_connect('dbXDebug', 'root', 'root', 'hoja1ejer4');

if ($conexion) {
    mysqli_set_charset($conexion, 'utf8');
}

$titulo = "";
$grupo = "";
$disco = "";
$ano = "";
$duracion = "";

if (isset($_GET['boton'])) {
    $accion = $_GET['boton'];
    $query = "";
    $titulo = $_GET['titulo'];
    $grupo = $_GET['grupo'];
    $disco = $_GET['disco'];
    $ano = (int)$_GET['ano'];
    $duracion = (int)$_GET['duracion'];

    switch ($accion) {
        case 'Añadir canción':
            $query = "INSERT INTO `discos`(`titulo`, `grupo`, `disco`, `ano`, `duracion`) VALUES ('$titulo', '$grupo', '$disco', $ano, $duracion)";
            break;

        case 'Borrar discos seleccionados':
            if (isset($_GET['seleccionar'])) {
                foreach ($_GET['seleccionar'] as $titulo) {
                    $query = "DELETE FROM `discos` WHERE `titulo`='$titulo'";
                }
            }
            break;

        case 'Modificar rexisto Seleccionado':
            if (isset($_GET['seleccionar']) && count($_GET['seleccionar']) === 1) {
                $titulo_seleccionado = $_GET['seleccionar'][0];

                // Tenemos que construir la consulta por favor, porque si no están cumplimentados en el form, nos dará error en la consulta
                $updates = [];
                if (!empty($titulo)) $updates[] = "`titulo`='$titulo'";
                if (!empty($grupo)) $updates[] = "`grupo`='$grupo'";
                if (!empty($disco)) $updates[] = "`disco`='$disco'";
                if (!empty($ano)) $updates[] = "`ano`=$ano";
                if (!empty($duracion)) $updates[] = "`duracion`=$duracion";

                // Ahora con los campos, construimos la consulta
                if (!empty($updates)) {
                    $query = "UPDATE `discos` SET " . implode(", ", $updates) . " WHERE `titulo`='$titulo_seleccionado'";
                
                    echo "Disco actualizado con éxito.<br>";
                } else {
                    echo "No se ha introducido ningún dato para actualizar.<br>";
                }
            } else {
                echo "Selecciona un solo disco para modificar.";
            }
    }

    if (!empty($query)) {
        mysqli_query($conexion, $query);
        header("Location: 4.php");//redirijo al usuario a la página sin datos, sino me quedan cargados y me duplica registros cada vez que recargo
        exit;
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
        table, th, td {
            border: solid 1px black;
            border-collapse: collapse;
        }
    </style>
</head>
<body>

    <form action="4.php" method="get">
        
        <input type="text" name="titulo" id="titulo" placeholder="Título">
        <input type="text" name="grupo" id="grupo" placeholder="Grupo">
        <input type="text" name="disco" id="disco" placeholder="Disco">
        <input type="text" name="ano" id="ano" placeholder="Año">
        <input type="text" name="duracion" id="duracion" placeholder="Duración (segundos)">

        <br><br>

        <input type="submit" name="boton" value="Añadir canción">
        <input type="submit" name="boton" value="Borrar discos seleccionados">
        <input type="submit" name="boton" value="Modificar rexisto Seleccionado">
        <br><br>

        <table>
            <tr>
                <th>Título</th>jpg";

                <th>Grupo</th>
                <th>Disco</th>
                <th>Año</th>
                <th>Duración</th>
                <th>Seleccionado</th>
            </tr>

            <?php
                if($conexion) {
                    $datos = mysqli_query($conexion, "SELECT * FROM discos");
                }

                while ($fila = mysqli_fetch_array($datos)) {
                    echo '<tr>
                            <td>' . ($fila["titulo"]) . '</td>
                            <td>' . ($fila["grupo"]) . '</td>
                            <td>' . ($fila["disco"]) . '</td>
                            <td>' . ($fila["ano"]) . '</td>
                            <td>' . ($fila["duracion"]) . '</td>
                            <td><input type="checkbox" name="seleccionar[]" value="' . $fila["titulo"] . '"></td>
                          </tr>';
                }
            ?>
        </table>
    </form>

</body>
</html>
