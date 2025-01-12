<?php
session_start();

// Ruta del archivo donde se guardará el diccionario
define('DICCIONARIO_FILE', 'dicionario.txt');

// Función para guardar el diccionario en un archivo
function guardarDiccionario($dicionario) {
    if ($fich = fopen(DICCIONARIO_FILE, 'w')) {
        foreach ($dicionario as $ingles => $galego) {
            fprintf($fich, "%s|%s\n", $ingles, $galego);
        }
        fclose($fich);
    } else {
        echo "<p>Erro ao gardar o diccionario.</p>";
    }
}

// Función para cargar el diccionario desde un archivo
function cargarDiccionario() {
    $dicionario = [];
    if (file_exists(DICCIONARIO_FILE)) {
        $dicionarioArray = file(DICCIONARIO_FILE);
        foreach ($dicionarioArray as $line) {
            list($ingles, $galego) = explode('|', trim($line));
            $dicionario[$ingles] = $galego;
        }
    }
    return $dicionario;
}

// Cargar el diccionario desde la sesión o archivo
if (!isset($_SESSION['dicionario'])) {
    $_SESSION['dicionario'] = cargarDiccionario();
}

$dicionario = $_SESSION['dicionario'];

// Agregar palabras nuevas
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['ingles']) && isset($_POST['galego'])) {
    $ingles = trim($_POST['ingles']);
    $galego = trim($_POST['galego']);

    if (!array_key_exists($ingles, $dicionario)) {
        $dicionario[$ingles] = $galego;
        echo "<p>Rexistro inserido correctamente.</p>";
    } else {
        echo "<p>Erro: a palabra '$ingles' xa existe no dicionario.</p>";
    }
}

// Eliminar palabras
if (isset($_GET['eliminar'])) {
    $eliminar = $_GET['eliminar'];
    if (isset($dicionario[$eliminar])) {
        unset($dicionario[$eliminar]);
        echo "<p>Rexistro eliminado correctamente.</p>";
    }
}

// Guardar el diccionario actualizado en la sesión y el archivo
$_SESSION['dicionario'] = $dicionario;

guardarDiccionario($dicionario);

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Diccionario Inglés-Galego</title>
</head>
<body>
    <h1>Diccionario Inglés-Galego</h1>
    <table border="1">
        <tr>
            <th>Inglés</th>
            <th>Galego</th>
            <th>Acción</th>
        </tr>
        <?php foreach ($dicionario as $ingles => $galego): ?>
            <tr>
                <td><?= htmlspecialchars($ingles) ?></td>
                <td><?= htmlspecialchars($galego) ?></td>
                <td><a href="?eliminar=<?= urlencode($ingles) ?>">Eliminar</a></td>
            </tr>
        <?php endforeach; ?>
    </table>

    <h2>Engadir unha nova palabra</h2>
    <form method="POST">
        <label for="ingles">Inglés:</label>
        <input type="text" name="ingles" id="ingles" required>
        <label for="galego">Galego:</label>
        <input type="text" name="galego" id="galego" required>
        <button type="submit">Insertar</button>
    </form>
</body>
</html>
