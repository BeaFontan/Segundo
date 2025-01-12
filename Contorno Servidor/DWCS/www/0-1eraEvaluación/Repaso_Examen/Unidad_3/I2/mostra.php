<?php 
try {
	$pdo = new PDO("mysql:host=dbXDebug;dbname=Zexamen;charset=utf8",'proba', 'abc123.');
	$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	echo "Conexión realizada";

} catch (PDOException $e) {
	echo "Erro na conexión: " . $e->getMessage();
}

function listarTodos($pdo){
	$query = $pdo->query("Select * from material");
	return $query->fetchAll();
}

$arrayProductos = [];

if (isset($_GET["boton"])) {
	switch ($_GET["boton"]) {
		case 'listarTodos':
			$arrayProductos = listarTodos($pdo);
			break;
		
		case 'listarOrdenadorMarca':
			$query = $pdo->query("Select * from material order by Marca");
			$arrayProductos = $query->fetchAll();
			break;
		
		case 'listarOrdenadoPrezo':
			$query = $pdo->query("Select * from material order by Prezo");
			$arrayProductos = $query->fetchAll();
			break;
		
		case 'buscarMarca':
			$marcaABuscar = $_GET["textBuscar"];
			if (empty($marcaABuscar)) {
				$mensaje = "Debes introducir unha marca";
			}else {
				$query = $pdo->prepare("Select * from material where Marca like ?");
				$query->execute(array($marcaABuscar));
				$arrayProductos = $query->fetchAll();
	
				$mensaje = "<p>Producto non atopado</p>";
			}
			break;

		case 'BuscarCalqueraCampo':
			$campoBuscar = $_GET["textBuscarCalquera"];
			if (empty($campoBuscar)) {
				$mensaje = "Debes introducir un campo";
			}else{
				$query = $pdo->prepare("Select * from material where Nome like ? or Marca like ? or Tipo like ? or Prezo like ?");
				$query->execute(array($campoBuscar, $campoBuscar, $campoBuscar, $campoBuscar));
				$arrayProductos = $query->fetchAll();

				$mensaje = "<p>Producto non atopado</p>";
			}
			break;

		case 'listarSeleccionado':
			$tipoSeleccionado = $_GET["selectMarca"];
			$query = $pdo->prepare("Select * from material where Tipo like ?");
			$query->execute(array($tipoSeleccionado));
			$arrayProductos = $query->fetchAll();
			break;
		
		case 'agregarProducto':
			$nome = $_GET["textNome"];
			$marca = $_GET["textMarca"];
			$tipo = (int) $_GET["textTipo"];
			$prezo = $_GET["textPrezo"];
			$imaxe = $_GET["textImaxe"];
			
			$query = $pdo->prepare("Select * from material where Nome like ?");
			$query->execute(array($nome));
			$productoExistente = $query->fetchAll();

			if (!empty($productoExistente)) {
				echo "<p>O nome do producto xa existe</p>";

				$arrayProductos = listarTodos($pdo);
			}elseif (!is_numeric($prezo)) {
				echo "<p>O prezo debe ser un número</p>";
				$arrayProductos = listarTodos($pdo);

			}else {
				$query = $pdo->prepare("INSERT INTO `material`(`Nome`, `Marca`, `Tipo`, `Prezo`, `Imaxe`) VALUES (?,?,?,?,?)");
				$query->execute(array($nome, $marca, $tipo, $prezo, $imaxe));
	
				echo "<p>Producto introducido correctamente</p>";
	
				$arrayProductos = listarTodos($pdo);
			}
			break;
		
		case 'eliminarProducto':
			$productoEliminar = $_GET["textEliminarNome"];

			$query = $pdo->prepare("Select * from material where Nome like ?");
			$query->execute(array($productoEliminar));
			$productoExistente = $query->fetchAll();

			if (empty($productoExistente)) {
				$mensaje = "<p>O producto non existe</p>";

				$arrayProductos = listarTodos($pdo);
			}else {
				$query = $pdo->prepare("DELETE FROM `material` WHERE Nome like ?");
				$query->execute(array($productoEliminar));

				$arrayProductos = listarTodos($pdo);

				echo "<p>Producto eliminado correctamente</p>";
			}
			break;

		case 'modificarProducto':
			$nome = $_GET["textNome"];
			$marca = $_GET["textMarca"];
			$tipo = (int) $_GET["textTipo"];
			$prezo = $_GET["textPrezo"];
			$imaxe = $_GET["textImaxe"];

			$productoAModificar = $_GET["textModificarNome"];
			
			$query = $pdo->prepare("Select * from material where Nome like ?");
			$query->execute(array($productoAModificar));
			$productoExistente = $query->fetch();

			if ($productoExistente) {
				$query = $pdo->prepare("UPDATE `material` SET `Nome`=?,`Marca`=?,`Tipo`=?,`Prezo`=?,`Imaxe`=? WHERE Nome like ?");

				$nome = !empty($nome) ? $nome :$productoExistente["Nome"];
				$marca = !empty($marca) ? $marca :$productoExistente["Marca"];
				$tipo = !empty($tipo) ? $tipo :$productoExistente["Tipo"];
				$prezo = !empty($prezo) ? $prezo :$productoExistente["Prezo"];
				$imaxe = !empty($imaxe) ? $imaxe :$productoExistente["Imaxe"];

				if (!is_numeric($prezo)) {
					echo "<p>O prezo debe ser un número</p>";
					$arrayProductos = listarTodos($pdo); 
					break;
				}

				$query->execute(array($nome, $marca, $tipo, $prezo, $imaxe, $productoAModificar));
	
				echo "<p>Producto modificado correctamente</p>";
	
				$arrayProductos = listarTodos($pdo);
			}else {
				echo "<p>O producto non existe</p>";

				$arrayProductos = listarTodos($pdo);
			}
			break;
	}
}
?>

<!DOCTYPE html>
<html>
<head>
<style>
	#contenedor {
		width:70%;
		margin:20px auto;
		background-color:white;
		display: grid; 
		grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
		grid-gap: 5px; }
	.produto {
		/* width:200px; */
		height:210px;
		background-color:white;
		border:1px black solid;
		text-align: center;
		padding-top:20px;
		font-family:Arial;}
	img {
	width:130px;
	height:130px;}
</style>
<meta charset="utf-8" />
<title></title>
</head>
<body>
<form action="intro.php" method="GET">
	<button type="submit">Volver</button>
</form>

<article id="contenedor">
<?php
if ($arrayProductos) {
	foreach ($arrayProductos as $producto) {
		$srcImaxe = $producto["Imaxe"];
		echo "<div class='produto'>
				<img src='imaxes/$srcImaxe'>
				<div>".$producto["Nome"]."</div>
				<div>".$producto["Marca"]."</div>
				<div>".$producto["Tipo"]."</div>
				<div>".$producto["Prezo"]."</div>
			 </div>";
	}
}else {
	echo $mensaje;
}
?>
<article>
</body>
</html>






















