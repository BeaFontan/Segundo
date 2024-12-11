<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="mostra.php" method="GET">
        <button type="submit" name="boton" value="listarTodos">Lista todos os produtos</button></br></br></br>
        <button type="submit" name="boton" value="listarPorMarca">Listar ordenados pola marca</button></br></br></br>
        <button type="submit" name="boton" value="listarPorPrezo">Lista Ordenados polo prezo</button></br></br></br>

        <input type="text" name="textBuscaMarca" placeholder="Introduce a marca">
        <button type="submit" name="boton" value="buscarPorMarca">Buscar por unha marca</button></br></br></br>

        <input type="text" name="textBuscaCalquerCampo" placeholder="Introduce o campo">
        <button type="submit" name="boton" value="buscarPorCalquerCampo">Buscar por calquera campo da base de datos </button></br></br></br>

        <select name="selectTipo">
            <?php
                include 'conexion.php';

                try {
                    $query = $pdo->query("Select distinct Tipo from material");
                    $query->execute();
                    $arrayTipos = $query->fetchAll();
                } catch (PDOException $e) {
                    echo "Erro listando tipos" . $e->getMessage();
                }

                if (!empty($arrayTipos)) {
                   foreach ($arrayTipos as $tipo) {
                        echo '<option value="'.$tipo[0].'">'.$tipo[0].'</option>';
                   }
                }
            ?>
        </select>
        <button type="submit" name="boton" value="buscarPorTipoSeleccionado">Buscar por tipo seleccionado</button></br></br></br>

        <hr>
    
        <p>Sigue as intruccións:</p>

        <p>Campos para cubrir en INSERTAR e MODIFICAR:</p>

        <input type="text" name="textNome" placeholder="Nome">
        <input type="text" name="textMarca" placeholder="Marca">
        <input type="text" name="textTipo" placeholder="Tipo">
        <input type="text" name="textPrezo" placeholder="Prezo">
        <input type="text" name="textImaxe" placeholder="Imaxe"></br></br></br>

        <hr>
        <p>Para insertar cubre os campos de arriba e despois pulsa INSERTAR:</p>

        <button type="submit" name="boton" value="insertar">Insertar</button></br></br></br>

        <hr>
        <p>Para modificar un producto indica o nome do prouducto que queres modificar no campo de texto de abaixo, logo cubre os datos a modificar nos campos de arriba e logo pulsa MODIFICAR:</p>
        <input type="text" name="textModificar" placeholder="Nome do producto a modificar">
        <button type="submit" name="boton" value="modificar">Modificar</button></br></br></br>

        <hr>
        <p>Para eliminar un producto indica o nome do prouducto no campo de texto de abaixoe logo pulsa ELIMINAR:</p>
        <input type="text" name="textEliminar" placeholder="Nome do producto a eliminar">
        <button type="submit" name="boton" value="eliminar">Eliminar</button></br></br></br>


    </form>
</body>
</html>