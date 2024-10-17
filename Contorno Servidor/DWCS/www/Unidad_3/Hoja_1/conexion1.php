<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    $conexion = mysqli_connect("dbXdebug", "root", "root", "folla1");


    if ($conexion) {
        mysqli_set_charset($conexion, 'utf8');

        $datos = mysqli_query($conexion, "SELECT id, dni, nome, apelidos, idade from xogador");
    }

    if ($datos) {
        while ($fila=mysqli_fetch_array($datos)) {
            echo "{$fila["id"]} </br> {$fila["dni"]} </br> {$fila["nome"]} </br> {$fila["apelidos"]} </br> {$fila["idade"]} </br>";
        }
    }

    ?>
</body>
</html>