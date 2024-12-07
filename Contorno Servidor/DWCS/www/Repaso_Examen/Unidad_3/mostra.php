<?php
//FORMULARIO DE BOTOS QUE PASA LA ACCIÓN QUE ESTÁ HACIENDO EL USUARIO, 

$mensaje = "";//variable para mostrar mensajes de introducir, modificar y eliminar.

//conexión
try {
    $pdo = new PDO("mysql:host=dbXDebug;dbname=zrepaso;charset=utf8", 'usuarioProba', 'abc123.');
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Conexión realizada";

} catch (PDOException $e) {
    echo "Erro na conexión á base" . $e->getMessage();
}

//función para listar todos.
function listarTodos(){
	try {
		$pdo = new PDO("mysql:host=dbXDebug;dbname=zrepaso;charset=utf8", 'usuarioProba', 'abc123.');
		$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	
	} catch (PDOException $e) {
		echo "Erro na conexión á base" . $e->getMessage();
	}

	try {
		$query = $pdo->query("Select * from material");
		$query->execute();
		return $arrayProductos = $query->fetchAll();

	
	} catch (PDOException $e) {
		echo"Erro mostrando todos os productos" . $e->getMessage();
	}
}

//CÓDIGO DE ACCIONES
$arrayProductos="";

if ($_GET["boton"]) {
	$accion = $_GET["boton"];

	switch ($accion) {
		case 'listar':
			$arrayProductos = listarTodos();
			
			break;	
		
		case 'listarMarca':
			$query = $pdo->query("Select * from material order by marca");
			$query->execute();
			$arrayProductos = $query->fetchAll();

			break;

		case 'listarPrezo':
			$query = $pdo->query("Select * from material order by prezo");
			$query->execute();
			$arrayProductos = $query->fetchAll();

			break;

		case 'buscarMarca':
			$marca = $_GET["textBuscar"];

			$query = $pdo->prepare("Select * from material where Marca like ?");
			$query->execute(array($marca));
			$arrayProductos = $query->fetchAll();

			break;
		
		case 'buscarMarcaCualquiera':
			$palabraBuscar = $_GET["textBuscarCualquiera"];

			$query = $pdo->prepare("Select * from material where Nome like ? or Marca like ? or Tipo like ? or Prezo like ?");
			$query->execute(array($palabraBuscar, $palabraBuscar, $palabraBuscar, $palabraBuscar));
			$arrayProductos = $query->fetchAll();

			break;

		case 'buscarSeleccionado':
			$palabraBuscar = $_GET["seleccionarProducto"];

			$query = $pdo->prepare("Select * from material where Tipo like ?");
			$query->execute(array($palabraBuscar));
			$arrayProductos = $query->fetchAll();

			break;
		
		case 'Introducir':
			$nome = $_GET["textoNome"];
			$marca = $_GET["textoMarca"];
			$tipo = $_GET["textoTipo"];
			$prezo = (int) $_GET["textoPrezo"];
			$foto = $_GET["textoFoto"];

			$query = $pdo->prepare("INSERT INTO `material`(`Nome`, `Marca`, `Tipo`, `Prezo`, `Imaxe`) VALUES (?,?,?,?,?)");
			$query->execute(array($nome, $marca, $tipo, $prezo, $foto));

			$arrayProductos = listarTodos();
			$mensaje = "Producto agregado correctamente";
			break;
		
		case 'Modificar':
			$NombreAModificar = $_GET["elementoModificar"];

			$nome = $_GET["textoNome"];
			$marca = $_GET["textoMarca"];
			$tipo = $_GET["textoTipo"];
			$prezo = (int) $_GET["textoPrezo"];
			$foto = $_GET["textoFoto"];

			$query = $pdo->prepare("Select * from material where Nome like ?");
			$query->execute(array($NombreAModificar));
			$productoExistente = $query->fetch();

			if ($productoExistente) {
				$nome = !empty($nome) ? $nome : $productoExistente["Nome"];
				$marca = !empty($marca) ? $marca : $productoExistente["Marca"];
				$tipo = !empty($tipo) ? $tipo : $productoExistente["Tipo"];
				$prezo = !empty($prezo) ? $prezo : $productoExistente["Prezo"];
				$foto = !empty($foto) ? $foto : $productoExistente["Imaxe"];
	
				$query = $pdo->prepare("UPDATE `material` SET `Nome`=?,`Marca`=?,`Tipo`=?,`Prezo`=?,`Imaxe`=? WHERE `Nome` = ?");
				$query->execute(array($nome, $marca, $tipo, $prezo, $foto, $NombreAModificar));
	
				$arrayProductos = listarTodos();
				$mensaje = "Producto modificado correctamente";

			}else{
				$mensaje = "El producto no existe";
				$arrayProductos = listarTodos();
			}
			break;

		case 'Eliminar':
			$productoEliminar = $_GET["elementoEliminar"];

			$query = $pdo->prepare("Select * from material where Nome like ?");
			$query->execute(array($productoEliminar));
			$producto = $query->fetch();

			if ($producto) {
				$query = $pdo->prepare("Delete from material where Nome like ?");
				$query->execute(array($productoEliminar));

				$arrayProductos = listarTodos();
				$mensaje = "Producto eliminado";

			}else{
				$mensaje = "El producto no existe";
				$arrayProductos = listarTodos();
			}

			
			break;
	}
}
?>

<!DOCTYPE html>
<html>
<head>
<style>
	#contenedor
	{
		width:70%;
		margin:20px auto;
		background-color:white;
			
		display: grid; 
		grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
		grid-gap: 5px; 
	
	}

	.produto
	{
		/* width:200px; */
		height:210px;
		background-color:white;
		border:1px black solid;
		text-align: center;
		padding-top:20px;
		font-family:Arial;
			
	}
	img
	{
	width:130px;
	height:130px;
		
	}
</style>


<meta charset="utf-8" />
<title></title>
</head>
<body>
<article id="contenedor">
<?php
	if ($arrayProductos) {
		foreach ($arrayProductos as $producto) {
			$srcImaxe = $producto[4];
			echo "<div class='produto'>
					<img src='imaxes/$srcImaxe'>
					<div>$producto[0]</div>
					<div>$producto[1]</div>
					<div>$producto[2]</div>
					<div>$producto[3]</div>
				</div>";
		};
	}

	if ($mensaje) {
		echo '<p>'.$mensaje.'</p>';
	}
?>

<!-- Botón para volver a la página de inicio -->
<form action="intro.php" method="GET">
	<input type="submit" value="volver">
</form>

<article>
</body>
</html>






















