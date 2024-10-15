<!DOCTYPE html>
<html lang="gl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Xestión de Traxectos</title>
    <style>
        body {
            background-color: #f0f0f0;
            font-family: Arial, sans-serif;
            text-align: center;
        }
        table {
            width: 80%;
            margin: 20px auto;
            border-collapse: collapse;
        }
        th, td {
            padding: 10px;
            border: 1px solid #999;
        }
        th {
            background-color: lime;
        }
        input, select {
            margin: 10px;
        }
    </style>
</head>
<body>

<h1>Xestión de Traxectos</h1>

<?php
// Inicializar el array de trayectos o recuperar los enviados
if (isset($_POST['viajes_completo'])) {
    $viajes_completo = unserialize($_POST['viajes_completo']); // Guardamos siempre todos los trayectos, incluyendo nuevos
} else {
    // Array inicial de trayectos
    $viajes_completo = [
        ['origen' => 'Madrid', 'destino' => 'Segovia', 'distancia' => 90201],
        ['origen' => 'Madrid', 'destino' => 'A Coruña', 'distancia' => 596887],
        ['origen' => 'Barcelona', 'destino' => 'Cádiz', 'distancia' => 1152669],
        ['origen' => 'Bilbao', 'destino' => 'Valencia', 'distancia' => 622233],
        ['origen' => 'Sevilla', 'destino' => 'Santander', 'distancia' => 832067],
        ['origen' => 'Oviedo', 'destino' => 'Badajoz', 'distancia' => 682429],
    ];
}

// Procesar las acciones del formulario
$viajes = $viajes_completo; // Usamos la lista completa por defecto

if (isset($_POST['accion'])) {
    switch ($_POST['accion']) {
        case 'Engadir':
            // Añadir un nuevo trayecto
            $nuevo_origen = $_POST['origen'];
            $nuevo_destino = $_POST['destino'];
            $nueva_distancia = (int)$_POST['distancia'];
            if (!empty($nuevo_origen) && !empty($nuevo_destino) && $nueva_distancia > 0) {
                $viajes_completo[] = ['origen' => $nuevo_origen, 'destino' => $nuevo_destino, 'distancia' => $nueva_distancia];
            }
            break;

        case 'Eliminar':
            // Eliminar un trayecto
            unset($viajes_completo[$_POST['indice']]);
            $viajes_completo = array_values($viajes_completo); // Reindexar el array
            break;

        case 'Ordenar':
            // Ordenar los trayectos según el campo seleccionado
            $campo = $_POST['ordenar_por'];
            usort($viajes, function($a, $b) use ($campo) {
                if ($campo == 'distancia') {
                    return $a[$campo] - $b[$campo];
                } else {
                    return strcmp($a[$campo], $b[$campo]);
                }
            });
            break;

        case 'Buscar':
            // Filtrar trayectos por origen o destino
            $buscar = strtolower($_POST['buscar']);
            $viajes = array_filter($viajes_completo, function($viaje) use ($buscar) {
                return stripos($viaje['origen'], $buscar) !== false || stripos($viaje['destino'], $buscar) !== false;
            });
            break;

        case 'Mostrar todos':
            // Mostrar todos los trayectos restaurando el array completo
            $viajes = $viajes_completo;
            break;
    }
}
?>

<!-- Formulario para añadir un trayecto -->
<form method="POST" action="2.php">
    <h3>Engadir traxecto:</h3>
    <label for="origen">Orixe:</label>
    <input type="text" name="origen" >
    <label for="destino">Destino:</label>
    <input type="text" name="destino" >
    <label for="distancia">Distancia (metros):</label>
    <input type="number" name="distancia" >
    <input type="submit" name="accion" value="Engadir">
    <br><br>

    <!-- Formulario para ordenar trayectos -->
    <h3>Ordenar traxectos:</h3>
    <label for="ordenar_por">Ordenar por:</label>
    <select name="ordenar_por">
        <option value="origen">Orixe</option>
        <option value="destino">Destino</option>
        <option value="distancia">Distancia</option>
    </select>
    <input type="submit" name="accion" value="Ordenar">
    <br><br>

    <!-- Formulario para buscar trayectos -->
    <h3>Buscar traxecto:</h3>
    <label for="buscar">Buscar por orixe ou destino:</label>
    <input type="text" name="buscar">
    <input type="submit" name="accion" value="Buscar">
    <br><br>

    <!-- Botón para mostrar todos los viajes -->
    <input type="submit" name="accion" value="Mostrar todos">

    <!-- Enviar el array serializado -->
    <input type="hidden" name="viajes_completo" value="<?php echo htmlspecialchars(serialize($viajes_completo)); ?>">
</form>

<!-- Mostrar tabla de trayectos -->
<h3>Lista de Traxectos:</h3>
<table border="1">
    <tr>
        <th>Orixe</th>
        <th>Destino</th>
        <th>Distancia (m)</th>
        <th>Acción</th>
    </tr>

    <?php if (!empty($viajes)): ?>
        <?php foreach ($viajes as $indice => $viaje): ?>
        <tr>
            <td><?php echo $viaje['origen']; ?></td>
            <td><?php echo $viaje['destino']; ?></td>
            <td><?php echo $viaje['distancia']; ?></td>
            <td>
                <form method="POST" action="2.php" style="display:inline;">
                    <input type="hidden" name="indice" value="<?php echo $indice; ?>">
                    <input type="hidden" name="viajes_completo" value="<?php echo htmlspecialchars(serialize($viajes_completo)); ?>">
                    <input type="submit" name="accion" value="Eliminar">
                </form>
            </td>
        </tr>
        <?php endforeach; ?>
    <?php else: ?>
        <tr><td colspan="4">Non se atoparon traxectos</td></tr>
    <?php endif; ?>
</table>

<p>Total de traxectos: <?php echo count($viajes); ?></p>

</body>
</html>

