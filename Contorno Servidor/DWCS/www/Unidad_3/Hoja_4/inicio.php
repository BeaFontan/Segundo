<?php

//CONEXIÓN BASE
$conexion = new mysqli('dbXDebug', 'root', 'root', 'folla4');

if ($conexion->connect_error) {
    die("Non é posible conectar coa BD: ". $conexion->connect_error);
}

//OBTENCIÓN DE FAMILIAS

$queryFamilias = $conexion->prepare("SELECT cod, nombre FROM `familias` ORDER BY `nombre` ASC");

if (!$queryFamilias) {
    die("Erro en primer select: " . $conexion->error);
}

$queryFamilias->execute();

$familias = $queryFamilias->get_result(); //AQUÍ TENGO LA COLECCIÓN DE FAMILIAS

$queryFamilias->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Benvido</h1>
    </select>
    <form method="get" action="inicio.php">
        
        <h3>Escolle unha familia</h3>
        <?php
        //MOSTRAR FAMILIAS
        if ($familias && $familias->num_rows > 0) {
            echo '<select name="familiasSelect" id="familiasSelect">';
            while ($fila = $familias->fetch_array()) {
                
                echo '<option value="';
                echo $fila["nombre"];
                echo '">';
                echo $fila["nombre"];
                echo '</option>';
                
            }
            echo '<option value="todos">Todos</option>';
            echo "</select>";
        }?>

        </br></br></br>
        <input type="text" name="buscarFamilia" id="buscarFamilia">
        <button type="submit" name ="botonBuscar">Buscar productos</button>
    </form>


<?php 
//BUSCAR PRODUCTOS SEGÚN FAMILIA SELECCIONADA
$botonBuscar = isset($_GET["botonBuscar"]);
$familiaSeleccionada = isset($_GET["familiasSelect"]);

if (isset($botonBuscar)) {
    $queryProductos = $conexion->prepare("SELECT * FROM productos WHERE familia = ?");

    $queryProductos->bind_param('s', $familiaSeleccionada);

    if (!$queryProductos) {
        die("Erro busando os productos" . $conexion->error);
    }

    $queryProductos->execute();

    $productos = $queryProductos->get_result();//AQUÍ TENGO LA COLECCIÓN DE PRODUCTOS

    $queryProductos->close();

    //Muestro los productos
    if ($productos && $productos->num_rows > 0) {
        while ($fila = $productos->fetch_array()) {
            echo "<p> {$fila["id"]}, {$fila["nombre"]}, {$fila["nombre_corto"]}, {$fila["descripcion"]}, {$fila["pvp"]}, {$fila["id"]}. </p></br>";
        }
    
    }
}



?>




<?php $conexion->close();?>

    
</body>
</html>