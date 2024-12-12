<?php
include 'conexion.php';

function listarTodos($pdo){
	try {
		$query = $pdo->query("Select * from material");
		$query->execute();
		return $query->fetchAll();

	} catch (PDOException $e) {
		echo "Erro en listar todos" . $e->getMessage();
	}
}

function listarPorMarca($pdo){
	try {
		$query = $pdo->query("Select * from material order by Marca");
		$query->execute();
		return $query->fetchAll();

	} catch (PDOException $e) {
		echo "Erro en listar por marca" . $e->getMessage();
	}
}

function listarPorPrezo($pdo){
	try {
		$query = $pdo->prepare("Select * from material order by Prezo");
		$query->execute();
		return $query->fetchAll();

	} catch (PDOException $e) {
		echo "Erro en listar por prezo" . $e->getMessage();
	}
}

function buscarPorMarca($pdo, $marcaABuscar){
	$marcaABuscar = '%'.strtolower($marcaABuscar).'%';

	try {
		$query = $pdo->prepare("Select * from material where Marca like LOWER(?)");
		$query->execute(array($marcaABuscar));
		return $query->fetchAll();

	} catch (PDOException $e) {
		echo "Erro en listar por marca" . $e->getMessage();
	}
}

function buscarPorCalquerCampo($pdo, $campoABuscar){
	$campoABuscar = '%'.strtolower($campoABuscar).'%';

	try {
		$query = $pdo->prepare("Select * from material where Marca like LOWER(?) or Nome like LOWER(?) or Tipo like LOWER(?) or Prezo like LOWER(?) or Imaxe like LOWER(?)");
		$query->execute(array($campoABuscar, $campoABuscar, $campoABuscar, $campoABuscar, $campoABuscar));
		return $query->fetchAll();

	} catch (PDOException $e) {
		echo "Erro en listar por calquer campo" . $e->getMessage();
	}
}

function buscarPorTipoSeleccionado($pdo, $tipoSeleccionado){
	try {
		$query = $pdo->prepare("Select * from material where Tipo like ?");
		$query->execute(array($tipoSeleccionado));
		return $query->fetchAll();

	} catch (PDOException $e) {
		echo "Erro en listar por tipo seleccionado" . $e->getMessage();
	}
}

function buscarDuplicado($pdo, $nome, $marca){
	$nomeMinus = '%'.strtolower($nome) . '%';
	$marcaMinus = '%' . strtolower($marca).'%';
	try {
		$query = $pdo->prepare("Select * from material where Nome like LOWER(?) and Marca like LOWER(?)");
		$query->execute(array($nomeMinus, $marcaMinus));
		return $query->fetchAll();

	} catch (PDOException $e) {
		echo "Erro en listar por tipo seleccionado" . $e->getMessage();
	}
}

function insertar($pdo, $nome, $marca, $tipo, $prezo, $imaxe){

	$productoDuplicado = buscarDuplicado($pdo, $nome, $marca);

	if (!empty($productoDuplicado)) {
		echo "<p>O producto xa existe, debes poñer un nome e marca distintos</p>";
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

function buscarExistente($pdo, $nomeProducto){
	$nomeProducto = '%'. strtolower($nomeProducto) . '%';

	try {
		$query = $pdo->prepare("Select * from material where Nome like LOWER(?)");
		$query->execute(array($nomeProducto));
		return $query->fetch();

	} catch (PDOException $e) {
		echo "Erro buscando existente" . $e->getMessage();
	}
}


function modificar($pdo, $nome, $marca, $tipo, $prezo, $imaxe,$productoAModificar){

	$productoExistente = buscarExistente($pdo, $productoAModificar);

	if (empty($productoExistente)) {
		echo "<p>O producto non existe</p>";
	}else {
		try {
			$query = $pdo->prepare("UPDATE `material` SET `Nome`=?,`Marca`=?,`Tipo`=?,`Prezo`=?,`Imaxe`=? WHERE Nome like ?");

			$nome = !empty($nome) ? $nome : $productoExistente["Nome"];
			$marca = !empty($marca) ? $marca : $productoExistente["Marca"];
			$tipo = !empty($tipo) ? $tipo : $productoExistente["Tipo"];
			$prezo = !empty($prezo) ? $prezo : $productoExistente["Prezo"];
			$imaxe = !empty($imaxe) ? $imaxe : $productoExistente["Imaxe"];

			$query->execute(array($nome, $marca, $tipo, $prezo, $imaxe,$productoAModificar));

			echo "<p>Producto modificado correctamente</p>";
	
		} catch (PDOException $e) {
			echo "Erro modificando" . $e->getMessage();
		}
	}
}

function eliminar($pdo, $productoAEliminar){
	$productoExistente = buscarExistente($pdo, $productoAEliminar);

	if (empty($productoExistente)) {
		echo "<p>O producto non existe</p>";
	}else{
		try {
			$query = $pdo->prepare("DELETE FROM `material` WHERE Nome like ?");
			$query->execute(array($productoAEliminar));
			echo "<p>Producto eliminado correctamente</p>";
	
		} catch (PDOException $e) {
			echo "Erro eliminando" . $e->getMessage();
		}
	}
}


$nome = $_GET["textNome"];
$marca = $_GET["textMarca"];
$tipo = $_GET["textTipo"];
$prezo = $_GET["textPrezo"];
$imaxe = $_GET["textImaxe"];

if ($_GET["boton"]) {
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

		case 'buscarPorMarca':
			$marcaABuscar = $_GET["textBuscaMarca"];
			$arrayProductos = buscarPorMarca($pdo, $marcaABuscar);
			break;

		case 'buscarPorCalquerCampo':
			$campoABuscar = $_GET["textBuscaCalquerCampo"];
			$arrayProductos = buscarPorCalquerCampo($pdo, $campoABuscar);
			break;

		case 'buscarPorTipoSeleccionado':
			$tipoSeleccionado = $_GET["selectTipo"];

			$arrayProductos = buscarPorTipoSeleccionado($pdo, $tipoSeleccionado);
			break;

		case 'insertar': //BUSCAR ESXISTENTE
			if ($nome == "" || $marca == "") {
				echo "<p>Debes cubrir o nome e a marca</p>";
				break;
			}elseif (!is_numeric($prezo)) {
				echo "<p>O prezo non é valido</p>";
				break;
			}

			$prezo = (int) $prezo;
			insertar($pdo, $nome, $marca, $tipo, $prezo, $imaxe);
			$arrayProductos = listarTodos($pdo);
			break;

		case 'modificar':
			$productoAModificar = $_GET["textModificar"];

			if ($prezo != "" && !is_numeric($prezo)) {
				echo "<p>O prezo non é valido</p>";
				break;
			}

			$prezo = (int) $prezo;

			modificar($pdo, $nome, $marca, $tipo, $prezo, $imaxe,$productoAModificar);
			$arrayProductos = listarTodos($pdo);
			break;

		case 'eliminar':
			$productoAEliminar = $_GET["textEliminar"];
			eliminar($pdo, $productoAEliminar);
			$arrayProductos = listarTodos($pdo);
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

<form action="intro.php" method="GET">
	<button type="submit">Volver</button>
</form>

<article id="contenedor">
<?php	
	if (!empty($arrayProductos)) {
		foreach ($arrayProductos as $producto) {
			$srcImaxe = $producto["Imaxe"];
			echo "<div class='produto'>
					<img src='imaxes/$srcImaxe'>
					<div>{$producto["Nome"]}</div>
					<div>{$producto["Marca"]}</div>
					<div>{$producto["Tipo"]}</div>
					<div>{$producto["Prezo"]} €</div>
				 </div>";		
		}
	}else{
		echo "<p>Non se atopan resultados</p>";
	}
?>

<article>
</body>
</html>






















