<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<form action="mostra.php" method="GET">
    <button type="submit" name="boton" value="listarTodos">Listar Todos</button></br></br></br>
    <button type="submit" name="boton" value="listarOrdenadosMarca">Listar ordenados pola marca</button></br></br></br>
    <button type="submit" name="boton" value="listarOrdenadosPrezo">Listar ordenados polo prezo</button></br></br></br>

    <input type="text" name="textBuscar" placeholder="Introduce a marca a buscar">
    <button type="submit" name="boton" value="buscarPorMarca">Buscar Marca</button></br></br></br>

    <input type="text" name="textBuscarCualquierCampo" placeholder="Introduce o campo a buscar">
    <button type="submit" name="boton" value="buscarPorCualquierCampo">Buscar!</button></br></br></br>

    <select name="selectTipo">
        <?php
            try {
                $pdo = new PDO("mysql:host=dbXDebug;dbname=Zexamen;charset=utf8", 'usuarioProba', 'abc123.');
                $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                echo "Conexión realizada";

            } catch (PDOException $e) {
                echo "Erro na conexión: " . $e->getMessage();
            }

            try {
                $query = $pdo->query("Select distinct Tipo from material");
                $query->execute();
                $tipos = $query->fetchAll();

            } catch (PDOException $e) {
                echo "Erro cargando os tipos " . $e->getMessage();
            }

            if ($tipos) {
                foreach ($tipos as $tipo) {
                    echo '<option value="' . $tipo[0] . '">' . $tipo[0] .'</option>';
                }
            }
        ?>
    </select>
    <button type="submit" name="boton" value="listarPorTipo">Buscar!</button></br></br></br>

    <hr>
    <p>Intruccións:</p>

    <p> Si queres insertar cumplimenta os campos de abaixo e logo pulsa insertar</p>
    <button type="submit" name="boton" value="insertar">Insertar!</button></br></br></br>

    <input type="text" name="textInsertarNome" placeholder="Nome"> 
    <input type="text" name="textInsertarMarca" placeholder="Marca"> 
    <input type="text" name="textInsertarTipo" placeholder="Tipo"> 
    <input type="text" name="textInsertarPrezo" placeholder="Prezo"> 
    <input type="text" name="textInsertarImaxe" placeholder="Imaxe: Ex: foto.jpg"> </br></br>

    <p> Si queres modificar un producto, introduce o seu nome na caixa de abaixo e despois cumplimenta os campos a modificar nas caixas de texto de arriba. Cando teñas todo clica en modificar:</p>
    <input type="text" name="textModificarNome" placeholder="Nome"> 
    <button type="submit" name="boton" value="modificar">Modificar!</button></br></br></br>

    <hr>

    <p> Si queres eliminar un producto, introduce o seu nome na caixa de abaixo e despois presiona en Eliminar!</p>
    <input type="text" name="textEliminar" placeholder="Nome"> 
    <button type="submit" name="boton" value="eliminar">Eliminar!</button></br></br></br>
</form>
    
</body>
</html>