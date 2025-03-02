<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="mostra.php" method="GET">
        <button type="submit" name="boton" value="listarTodos">Listar todos os productos</button></br></br>
        <button type="submit" name="boton" value="listarPorMarca">Listar ordenados pola marca</button></br></br>
        <button type="submit" name="boton" value="listarPorPrezo">Lista Ordenados polo prezo</button></br></br>

        <input type="text" name="textBuscarMarca" placeholder="Introducir marca a buscar">
        <button type="submit" name="boton" value="buscarMarca">Buscar por marca</button></br></br>

        <input type="text" name="textBuscarCalquerCampo" placeholder="Introducir o campo a buscar">
        <button type="submit" name="boton" value="buscarPorCalquerCampo">Buscar por calquer campo</button></br></br>

        <select name="selectTipo" >
            <?php
               include 'conexion.php';

                try {
                    $query = $pdo->query("Select distinct Tipo from material");
                    $query->execute();
                    $arrayTipos = $query->fetchAll(PDO::FETCH_ASSOC); 
            
                } catch (PDOException $e) {
                    echo "Erro en select por tipo" . $e->getMessage();
                }

                if (!empty($arrayTipos)) {
                    foreach ($arrayTipos as $tipo) {
                        echo '<option value="'.$tipo["Tipo"] .'">' . $tipo["Tipo"].'</option>';
                    }
                }
            ?>
        </select>

        <button type="submit" name="boton" value="buscarPorTipoSeleccionado">Buscar por Tipo Seleccionado</button></br></br>
       
        <hr>

        <p>Sigue as instrucción</p>

        <p>Campos a cumplimentar para INSERTAR e MODIFICAR:</p>

        <input type="text" name="textNome" placeholder="Introduce o Nome"></br></br>
        <input type="text" name="textMarca" placeholder="Introduce o Marca"></br></br>
        <input type="text" name="textTipo" placeholder="Introduce o Tipo"></br></br>
        <input type="text" name="textPrezo" placeholder="Introduce o prezo"></br></br>
        <input type="text" name="textImaxe" placeholder="Introduce o imaxe"></br></br>
        
        <hr>

        <p>Para insertar cumplimenta os campos de arriba e despois pulsa INSERTAR</p>

        <button type="submit" name="boton" value="insertar">Insertar</button></br></br>

        <hr>

        <p>Para modificar, ntroduce o Nome do Producto a modificar aquí, cumplimenta os campos a modificar arriba e logo pulsa MODIFICAR</p>
        <input type="text" name="textmodificar" placeholder="Introduce o nome do producto a modificar" style="width: 300px;">
        <button type="submit" name="boton" value="modificar">Modificar</button></br></br>

        <hr>

        <p>Para eliminar, Introduce o Nome do Producto a eliminar aquí, e logo pulsa ELIMINAR</p>
        <input type="text" name="textEliminar" placeholder="Introduce o nome do producto a modificar" style="width: 300px;">
        <button type="submit" name="boton" value="eliminar">Eliminar</button></br></br>
    
    </form>
</body>
</html>