<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<form action="mostra.php" method="get">
    <button type="submit" name="boton" value="listarTodos">Lista todos os productos</button></br></br></br>
    <button type="submit" name="boton" value="listarOrdenadorMarca">Listar ordenados pola marca</button></br></br></br>
    <button type="submit" name="boton" value="listarOrdenadoPrezo">Lista Ordenados polo prezo</button></br></br></br>

    <input type="text" name="textBuscar" placeholder="Introduce a marca">
    <button type="submit" name="boton" value="buscarMarca">Buscar por unha marca</button></br></br></br>

    <input type="text" name="textBuscarCalquera" placeholder="Introduce o campo a buscar">
    <button type="submit" name="boton" value="BuscarCalqueraCampo">Buscar por calquera campo da base de datos </button></br></br></br>

    <select name="selectMarca">
        <?php
            try {
                $pdo = new PDO("mysql:host=dbXDebug;dbname=Zexamen;charset=utf8",'proba', 'abc123.');
                $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                echo "Conexión realizada";
            
            } catch (PDOException $e) {
                echo "Erro na conexión: " . $e->getMessage();
            }
            
            $query = $pdo->query("Select distinct Tipo from material");
            $tipos = $query->fetchAll();

            foreach ($tipos as $tipo) {
                echo '<option value="'.$tipo["Tipo"].'">'.$tipo["Tipo"].'</option>';
            }
        ?>
    </select>
    <button type="submit" name="boton" value="listarSeleccionado">Lista polo tipo de produto.</button></br></br></br>

    <hr>

    <input type="text" name="textNome" placeholder="Introduce o Nome">
    <input type="text" name="textMarca" placeholder="Introduce a Marca">
    <input type="text" name="textTipo" placeholder="Introduce Tipo">
    <input type="text" name="textPrezo" placeholder="Introduce o Prezo">
    <input type="text" name="textImaxe" placeholder="Introduce o nome da imaxen"></br></br>
    <button type="submit" name="boton" value="agregarProducto">Agregar producto</button></br></br></br>

    <input type="text" name="textModificarNome" placeholder="Introduce o nome do Producto a modificar" style="width: 300px;">
    <button type="submit" name="boton" value="modificarProducto">Modificar producto</button></br>
    <p>Para modificar un producto intrudece o nome do proudcto o campo a modificar e cumplimenta os campos de arriba de "Agregar Producto" que quieras modificar</p>

    <hr>
    <input type="text" name="textEliminarNome" placeholder="Introduce o nome do producto a eliminar" style="width: 300px;"> 
    <button type="submit" name="boton" value="eliminarProducto">Eliminar producto</button></br></br></br>
</form>
    
</body>
</html>