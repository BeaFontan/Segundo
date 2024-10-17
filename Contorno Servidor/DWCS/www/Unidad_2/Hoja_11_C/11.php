<!DOCTYPE html>
<html lang="gl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cine</title>
    <style>
        body {
            background-color: #245506; /* Fondo verde */
            color: white;
            text-align: center;
        }
        table {
            width: 80%;
            margin: 20px auto;
            border-collapse: collapse;
            background-color: white;
            color: black;
        }
        th {
            background-color: lime; /* Cabeceras en lime */
            padding: 10px;
        }
        td {
            padding: 10px;
        }
        img {
            width: 100%;
            height: auto;
        }
        input[type="submit"] {
            margin: 5px;
            padding: 5px;
        }
    </style>
</head>
<body>

<img src="EncabezamentoCine.png" alt="EncabezamentoCine">

<form method="POST" action="11.php">
    <label for="busqueda">Buscar exemplar:</label>
    <input type="text" name="busqueda">
    <input type="submit" name="accion" value="Buscar">
    <br><br>

    <input type="submit" name="accion" value="Ver listado completo das películas">
    <input type="submit" name="accion" value="Ordenado pola duración películas">
    <input type="submit" name="accion" value="Ordenado pola director">
    <input type="submit" name="accion" value="Ordenado polo título">
    <br><br>

    <label for="duracion">Con duración maior que:</label>
    <input type="text" name="duracion">
    <input type="submit" name="accion" value="Buscar por duración">
</form>

<?php
// Incluir el archivo de datos
include 'datos1.php';

// Convertir el array en un formato que funcione para ordenar y buscar
$peliculas = [];
foreach ($pelis as $titulo => $info) {
    $peliculas[] = ['titulo' => $titulo, 'director' => $info[0], 'duracion' => $info[1]];
}

// Definir el array filtrado
$peliculas_filtradas = $peliculas;

if (isset($_POST['accion'])) {
    $accion = $_POST['accion'];
    $busqueda = isset($_POST['busqueda']) ? $_POST['busqueda'] : '';
    $duracion = isset($_POST['duracion']) ? (int)$_POST['duracion'] : 0;

    // Usar switch para manejar cada acción
    switch ($accion) {
        case "Ver listado completo das películas":
            // Mostrar todas las películas sin filtrado
            $peliculas_filtradas = $peliculas;
            break;

        case "Ordenado pola duración películas":
            usort($peliculas_filtradas, function ($a, $b) {
                return $a['duracion'] - $b['duracion'];
            });
            break;

        case "Ordenado pola director":
            usort($peliculas_filtradas, function ($a, $b) {
                return strcmp($a['director'], $b['director']);
            });
            break;

        case "Ordenado polo título":
            usort($peliculas_filtradas, function ($a, $b) {
                return strcmp($a['titulo'], $b['titulo']);
            });
            break;

        case "Buscar":
            // Buscar en título o director
            if (!empty($busqueda)) {
                $peliculas_filtradas = array_filter($peliculas, function ($pelicula) use ($busqueda) {
                    return stripos($pelicula['titulo'], $busqueda) !== false || stripos($pelicula['director'], $busqueda) !== false;
                });
            }
            break;

        case "Buscar por duración":
            // Filtrar por duración mayor que un número
            if (!empty($duracion)) {
                $peliculas_filtradas = array_filter($peliculas, function ($pelicula) use ($duracion) {
                    return $pelicula['duracion'] > $duracion;
                });
            }
            break;

        default:
            // Si no se selecciona ninguna opción válida, mostrar todas las películas
            $peliculas_filtradas = $peliculas;
            break;
    }
}

// Mostrar los resultados en la tabla
echo "<table border='1'>";
echo "<tr><th>Título</th><th>Autor</th><th>Duración</th></tr>";
foreach ($peliculas_filtradas as $pelicula) {
    echo "<tr>";
    echo "<td>{$pelicula['titulo']}</td>";
    echo "<td>{$pelicula['director']}</td>";
    echo "<td>{$pelicula['duracion']}</td>";
    echo "</tr>";
}
echo "</table>";

// Mostrar el número de ejemplares encontrados
$num_encontrados = count($peliculas_filtradas);
echo "<p>O número de exemplares atopados é: $num_encontrados</p>";
?>

</body>
</html>
