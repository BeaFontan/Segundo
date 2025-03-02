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
        <button type="submit" name="boton" value="listarPorMarca">Lista ordenados marca</button></br></br></br>
        <button type="submit" name="boton" value="listarPorPrezo"> Lista Ordenados polo prezo</button></br></br></br>

        <input type="text" name="textBuscarMarca" placeholder="Introduce a marca a buscar">
        <button type="submit" name="boton" value="buscarPorMarca">Buscar por unha marca</button></br></br></br>

        <input type="text" name="textBuscarCalquerCampo" placeholder="Introduce o campo a buscar">
        <button type="submit" name="boton" value="buscarPorCalquerCampo">Buscar por calquera campo da base de datos </button></br></br></br>

        <select name="selectPorTipo">
            <?php
                try {
                    $pdo = new PDO("mysql:host=dbXDebug;dbname=Zexamen;charset=utf8", 'root', 'root');
                    $pdo->setAttribute(PDO::ERRMODE_EXCEPTION, PDO::ATTR_ERRMODE);
                    echo "Conexión realizada";
                } catch (PDOException $e) {
                    echo "Erro na Conexión".$e->getMessage();
                }

                try {
                    $query = $pdo->query("Select distinct Tipo from material");
                    $query->execute();
                    $tipos = $query->fetchAll(PDO::FETCH_ASSOC);
                } catch (PDOException $e) {
                    echo "Erro na Conexión".$e->getMessage();
                }

                foreach ($tipos as $tipo) {
                    echo '<option value="'.$tipo["Tipo"] .'">'.$tipo["Tipo"] .'</option>';
                }
            ?>
        </select>
        <button type="submit" name="boton" value="buscarTipoSeleccionado">Buscar por tipo de producto seleccionado</button></br></br></br>
        
        <hr>
        
        <p>Sigue as instruccións:</p>

        <p>Para insertar cubre os campos de abaixo e logo pulsa insertar.</p>
        
        <button type="submit" name="boton" value="insertar">Insertar</button></br></br>

        <input type="text" name="textNome" placeholder="Nome">
        <input type="text" name="textMarca" placeholder="Marca">
        <input type="text" name="textTipo" placeholder="Tipo">
        <input type="text" name="textPrezo" placeholder="Prezo">
        <input type="text" name="textImaxe" placeholder="Imaxe">

        
        <p>Para modificar: Selecciona o producto no desplegable, cumplimenta os campos de arriba con novos datos e logo pulsa Modificar</p>
        <select name="selectModificarYBorrar">
            <?php
                try {
                    $query = $pdo->query("Select * from material");
                    $query->execute();
                    $tipos = $query->fetchAll(PDO::FETCH_ASSOC);
                } catch (PDOException $e) {
                    echo "Erro na Conexión".$e->getMessage();
                }

                foreach ($tipos as $tipo) {
                    echo '<option value="'.$tipo["Nome"] .'">'.$tipo["Nome"] .'</option>';
                }
            ?>
        </select></br></br>

        <button type="submit" name="boton" value="modificar">Modificar</button>

        <button type="submit" name="boton" value="eliminar">Eliminar</button>
        
        <p>Para eliminar: Selecciona o producto a eliminar no desplegable e logo pulsa Eliminar</p>
   
        
    </form>
</body>
</html>