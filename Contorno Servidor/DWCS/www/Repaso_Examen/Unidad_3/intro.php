<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="mostra.php" method="get">
        <button type="submit" name="boton" value="listar">Listar todos os productos</button>
        <button type="submit" name="boton" value="listarMarca">Listar ordenados pola marca</button>
        <button type="submit" name="boton" value="listarPrezo">Listar ordenados polo prezo</button>
        </br></br></br>

        <input type="text" name="textBuscar" placeholder="Marca">
        <button type="submit" name="boton" value="buscarMarca">Buscar por marca</button>
        </br></br></br>
        
        <input type="text" name="textBuscarCualquiera" placeholder="Introduce la palabra a buscar">
        <button type="submit" name="boton" value="buscarMarcaCualquiera">Buscar</button>

        </br></br></br>
        <select name="seleccionarProducto">
        <?php 
            //conexión para mostrar los campos en el select 
            try {
                $pdo = new PDO("mysql:host=dbXDebug;dbname=zrepaso;charset=utf8", 'usuarioProba', 'abc123.');
                $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                echo "Conexión realizada";

            } catch (PDOException $e) {
                echo "Erro na conexión á base" . $e->getMessage();
            }

            try {
                $query = $pdo->query("Select distinct Tipo from material");
                $query->execute();
                $arrayTipos = $query->fetchAll();

            } catch (PDOException $e) {
                echo"Erro mostrando todos os productos" . $e->getMessage();
            }

            foreach ($arrayTipos as $tipo) {
                echo '<option value="' . $tipo[0] . '">'.$tipo[0].'</option>';
            }
            
        ?>
        </select>
        <button type="submit" name="boton" value="buscarSeleccionado">Buscar seleccionado</button>
        </br></br></br>
        
        <hr>
        <p>Introduce os datos do producto a introducir.</p>
        <input type="text" name="textoNome" placeholder="Introduce o nome"></br></br>
        <input type="text" name="textoMarca" placeholder="Introduce a Marca"></br></br>
        <input type="text" name="textoTipo" placeholder="Introduce o Tipo"></br></br>
        <input type="text" name="textoPrezo" placeholder="Introduce Prezo"></br></br>
        <input type="text" name="textoFoto" placeholder="Introduce o nome da foto con extensión"></br></br>

        <button type="submit" name="boton" value="Introducir">Intruducir producto</button></br></br>

        <hr>
        <button type="submit" name="boton" value="Modificar">Modificar producto</button>
        <input type="text" name="elementoModificar" placeholder="Introduce o nome do producto a modificar" style="width: 300px;"></br>
        <p>Cubre nos campos de texto de arriba os novos datos</p>
        <hr>
        <button type="submit" name="boton" value="Eliminar">Eliminar Producto</button>
        <input type="text" name="elementoEliminar" placeholder="Introduce o nome do producto a eliminar" style="width: 300px;"></br></br>

    </form>
</body>
</html>

