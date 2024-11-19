<?php

$conexion = mysqli_connect("dbXdebug", "root", "root", "Hoja 1 Ejer 3");

/*
$peliculas = [
    ['Inception', 'Christopher Nolan', 2010],
    ['The Godfather', 'Francis Ford Coppola', 1972],
    ['Pulp Fiction', 'Quentin Tarantino', 1994],
    ['Parasite', 'Bong Joon-ho', 2019],
    ['The Shawshank Redemption', 'Frank Darabont', 1994],
    ['The Dark Knight', 'Christopher Nolan', 2008],
];


    if ($conexion) {
        mysqli_set_charset($conexion, 'utf8');

        foreach ($peliculas as $pelicula) {
           $inserccion =  mysqli_query($conexion, "Insert into peliculas values ('{$pelicula[0]}', '{$pelicula[1]}', {$pelicula[2]})");
        }

        echo "entrou";
    }
    */
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="3.php" method="GET">

    <input type="submit" name="boton" value="Título ascendente">
    <input type="submit" name="boton" value="Título descendente">
    <input type="submit" name="boton" value="Director ascendente">
    <input type="submit" name="boton" value="Director descendente">
    <input type="submit" name="boton" value="Ano de menor a maior">
    <input type="submit" name="boton" value="Ano de maior a menor">

    <?php

    $accion = $_GET['boton'];

    switch ($accion) {
        case 'Título ascendente':
            
            $query = "SELECT * FROM `peliculas` ORDER by titulo asc;";
            break;
        case 'Título descendente':
            $query = "SELECT * FROM `peliculas` ORDER by titulo desc;";
            break;
        case 'Director ascendente':
            $query = "SELECT * FROM `peliculas` ORDER by director asc;";
            break;
        case 'Director descendente':
            $query = "SELECT * FROM `peliculas` ORDER by director desc;";
            break;            
        case 'Ano de menor a maior':
            $query = "SELECT * FROM `peliculas` ORDER by anho desc;";
            break;            
        case 'Ano de maior a menor':
            $query = "SELECT * FROM `peliculas` ORDER by anho asc;";
            break;                
    }

    if($conexion) {
        $resultado = mysqli_query($conexion, $query);
    }
    ?>  
    </form>

    <table>
        <tr>
            <th>Título</th>
            <th>Director</th>
            <th>Ano</th>
        </tr>
        <?php
        while ($fila = mysqli_fetch_array($resultado)) {
            echo "<tr>
            <td>{$fila["titulo"]}</td>
            <td>{$fila["director"]}</td>
            <td>{$fila["anho"]}</td>
            </tr>";
        }
        ?>
    </table>
    
</body>
</html>