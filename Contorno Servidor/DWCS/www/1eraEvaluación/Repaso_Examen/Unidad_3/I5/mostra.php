<?php
include 'conexion.php';

function listarTodos($pdo){
	try {
		$query = $pdo->query("Select * from material");
		$query->execute();
		return $query->fetchAll();
	} catch (PDOException $e) {
		echo "Erro listando todos" . $e->getMessage();
	}
}

function listarPorMarca($pdo){
	try {
		$query = $pdo->query("Select * from material order by Marca");
		$query->execute();
		return $query->fetchAll();
	} catch (PDOException $e) {
		echo "Erro listando por marca" . $e->getMessage();
	}
}

function listarPorPrezo($pdo){
	try {
		$query = $pdo->query("Select * from material order by Prezo");
		$query->execute();
		return $query->fetchAll();
	} catch (PDOException $e) {
		echo "Erro listando por prezo" . $e->getMessage();
	}
}

function buscarMarca($pdo){
	$MarcaABuscar = '%'. strtolower($_GET["textBuscarMarca"]).'%';

	try {
		$query = $pdo->prepare("Select * from material where Marca like LOWER(?)");
		$query->execute(array($MarcaABuscar));
		return $query->fetchAll(); 

	} catch (PDOException $e) {
		echo "Erro en buscar por marca" . $e->getMessage();
	}
}

function buscarPorCalquerCampo($pdo){
	$campoABuscar = '%' . strtolower($_GET["textBuscarCalquerCampo"] .'%');

	try {
		$query = $pdo->prepare("Select * from material where Marca like LOWER(?) or Nome like LOWER(?) or Tipo like LOWER(?) or Prezo like LOWER(?) or Imaxe like LOWER(?) ");
		$query->execute(array($campoABuscar, $campoABuscar, $campoABuscar, $campoABuscar, $campoABuscar));
		return $query->fetchAll(); 

	} catch (PDOException $e) {
		echo "Erro en buscar por marca" . $e->getMessage();
	}
}

function buscarPorTipoSeleccionado($pdo){
	$tipoABuscar = $_GET["selectTipo"];

	try {
		$query = $pdo->prepare("Select * from material where Tipo like ?");
		$query->execute(array($tipoABuscar));
		return $query->fetchAll();
	} catch (PDOException $e) {
		echo "Erro en buscar por marca" . $e->getMessage();
	}
}

function buscarDuplicado($pdo, $nome, $marca){
	try {
		$query = $pdo->prepare("Select * from material where Nome like ? and Marca like ?");
		$query->execute(array($nome, $marca));
		return $query->fetch();
	} catch (PDOException $e) {
		echo "Erro buscando duplicado" . $e->getMessage();
	}
}

function buscarExistente($pdo, $productoAModificar){
	$productoAModificar = '%'.strtolower($productoAModificar) . '%';
	try {
		$query = $pdo->prepare("Select * from material where Nome like LOWER(?) ");
		$query->execute(array($productoAModificar));
		return $query->fetch();
	} catch (PDOException $e) {
		echo "Erro buscando existente" . $e->getMessage();
	}
}

function insertar($pdo, $nome, $marca, $tipo, $prezo, $imaxe){

	$productoDuplicado = buscarDuplicado($pdo, $nome, $marca);

	if (!empty($productoDuplicado)) {
		echo "<p>Xa existe un producto con ese nome e esa marca</p>";
	}else{
		try {
			$query = $pdo->prepare("INSERT INTO `material`(`Nome`, `Marca`, `Tipo`, `Prezo`, `Imaxe`) VALUES (?,?,?,?,?)");
			$query->execute(array($nome, $marca, $tipo, $prezo, $imaxe));
			echo "<p>Producto insertado correctamente</p>";
		} catch (PDOException $e) {
			echo "Erro insertando" . $e->getMessage();
		}
	}
}

function modificar($pdo, $nome, $marca, $tipo, $prezo, $imaxe){
	$productoAModificar = $_GET["textmodificar"];

	$productoExistente = buscarExistente($pdo, $productoAModificar);

	if (empty($productoExistente)) {
		echo "<p>Non existe o producto a modificar</p>";
	}else{
		try {
			$query = $pdo->prepare("UPDATE `material` SET `Nome`=?,`Marca`=?,`Tipo`=?,`Prezo`=?,`Imaxe`=? WHERE Nome like ?");

			$nome = !empty($nome) ? $nome : $productoExistente["Nome"];
			$marca = !empty($marca) ? $marca : $productoExistente["Marca"];
			$tipo = !empty($tipo) ? $tipo : $productoExistente["Tipo"];
			$prezo = !empty($prezo) ? $prezo : $productoExistente["Prezo"];
			$imaxe = !empty($imaxe) ? $imaxe : $productoExistente["Imaxe"];

			$query->execute(array($nome, $marca, $tipo, $prezo, $imaxe, $productoAModificar));

			echo "<p>Producto modificado correctamente</p>";
		} catch (PDOException $e) {
			echo "Erro modificando" . $e->getMessage();
		}
	}
}

function eliminar($pdo){
	$productoABorrar = $_GET["textEliminar"];

	$productoExistente = buscarExistente($pdo, $productoABorrar);

	if (empty($productoExistente)) {
		echo "<p>Non existe o producto a eliminar</p>";
	}else{
		try {
			$query = $pdo->prepare("DELETE FROM `material` WHERE Nome like ?");
			$query->execute(array($productoABorrar));

			echo "<p>Producto eliminado correctamente</p>";
		} catch (PDOException $e) {
			echo "Erro eliminado" . $e->getMessage();
		}
	}
}

$nome = $_GET["textNome"];
$marca = $_GET["textMarca"];
$tipo = $_GET["textTipo"];
$prezo = $_GET["textPrezo"];
$imaxe = $_GET["textImaxe"];

if (isset($_GET["boton"])) {
	switch ($_GET["boton"]) {
		case 'listarTodos':
			$arrayProductos = listarTodos($pdo);
			break;

		case 'listarPorMarca':
			$arrayProductos = listarPorMarca($pdo);
			break;

		case 'listarPorPrezo':
			$arrayProductos = listarPorPrezo($pdo);
			break;

		case 'buscarMarca':
			$arrayProductos = buscarMarca($pdo);

			if (empty($arrayProductos)) {
				echo "<p>No se han encontrado resultados</p>";
			}
			break;
		
		case 'buscarPorCalquerCampo':
			$arrayProductos = buscarPorCalquerCampo($pdo);

			if (empty($arrayProductos)) {
				echo "<p>No se han encontrado resultados</p>";
			}
			break;

		case 'buscarPorTipoSeleccionado':
			$arrayProductos = buscarPorTipoSeleccionado($pdo);
			break;

		case 'insertar':
			if ($prezo == " " || !is_numeric($prezo)) {
				echo "<p>O prezo non é válido</p>";
				break;
			} elseif ($nome == "" || $marca == "" ) {
				echo "<p>Nome e marca non poden estar vacios</p>";
				break;
			}

			$prezo = (int) $prezo;
			insertar($pdo, $nome, $marca, $tipo, $prezo, $imaxe);
			$arrayProductos = listarTodos($pdo);
			break;

		case 'modificar':
			modificar($pdo, $nome, $marca, $tipo, $prezo, $imaxe);
			$arrayProductos = listarTodos($pdo);
			break;

		case 'eliminar':
			eliminar($pdo);
			$arrayProductos = listarTodos($pdo);
			break;
	}
}
?>

<!DOCTYPE html>
<html>
<head>
<style>
	#contenedor{
		width:70%;
		margin:20px auto;
		background-color:white;	
		display: grid; 
		grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
		grid-gap: 5px; 
	}
	.produto{
		/* width:200px; */
		height:210px;
		background-color:white;
		border:1px black solid;
		text-align: center;
		padding-top:20px;
		font-family:Arial;
			
	}
	img{
		width:130px;
		height:130px;
	}
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
		if (!empty($arrayProductos)) {
			foreach ($arrayProductos as $producto) {
				$srcImaxe = $producto["Imaxe"];

				echo "<div class='produto'><img src='imaxes/$srcImaxe'>
				<div>{$producto["Nome"]}</div>
				<div>{$producto["Marca"]}</div>
				<div>{$producto["Tipo"]}</div>
				<div>{$producto["Prezo"]} €</div>
				</div>";
			}
		}
	?>
<article>
</body>
</html>