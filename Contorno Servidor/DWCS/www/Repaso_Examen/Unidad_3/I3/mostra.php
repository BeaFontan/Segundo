<?php
try {
	$pdo = new PDO("mysql:host=dbXDebug;dbname=Zexamen;charset=utf8", 'usuarioProba', 'abc123.');
	$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	//echo "Conexión realizada";
} catch (PDOException $e) {
	echo "Erro na conexión: " . $e->getMessage();
}

function listarTodos($pdo){
	try {
		$query = $pdo->query("Select * from material");
		$query->execute();
		return $query->fetchAll();

	} catch (PDOException $e) {
		echo "Erro en Listar Todos: " . $e->getMessage();
		return [];
	}
}

function listarOrdenadosMarca($pdo){
	try {
		$query = $pdo->query("Select * from material order by Marca");
		$query->execute();
		return $query->fetchAll();

	} catch (PDOException $e) {
		echo "Erro en Listar por marca: " . $e->getMessage();
		return [];
	}
}

function listarOrdenadosPrezo($pdo){
	try {
		$query = $pdo->query("Select * from material order by Prezo");
		$query->execute();
		return $query->fetchAll();

	} catch (PDOException $e) {
		echo "Erro en Listar por prezo: " . $e->getMessage();
		return [];
	}
}

function buscarPorMarca($pdo){
	try {
		$marcaABuscar = $_GET["textBuscar"];

		$query = $pdo->prepare("Select * from material where Marca like ?");
		$query->execute(array($marcaABuscar));
		return $query->fetchAll();

	} catch (PDOException $e) {
		echo "Erro en Buscar por marca: " . $e->getMessage();
		return [];
	}
}

function buscarPorCualquierCampo($pdo){
	try {
		$campoABuscar = $_GET["textBuscarCualquierCampo"];

		$query = $pdo->prepare("Select * from material where Marca like ? or Nome like ? or Tipo like ? or Prezo like ? or Imaxe like ?");
		$query->execute(array($campoABuscar, $campoABuscar, $campoABuscar, $campoABuscar, $campoABuscar));
		return $query->fetchAll();

	} catch (PDOException $e) {
		echo "Erro en Buscar por marca: " . $e->getMessage();
		return [];
	}
}

function listarPorTipo($pdo){
	try {
		$TipoAListar = $_GET["selectTipo"];

		$query = $pdo->prepare("Select * from material where Tipo like ?");
		$query->execute(array($TipoAListar));
		return $query->fetchAll();

	} catch (PDOException $e) {
		echo "Erro en Buscar por marca: " . $e->getMessage();
		return [];
	}
}

function buscarExistente($pdo, $productoABuscar){
	try {
		$query = $pdo->prepare("Select * from material where Nome like ?");
		$query->execute(array($productoABuscar));
		return $query->fetchAll();

	} catch (PDOException $e) {
		echo "Erro buscando o producto existente: " . $e->getMessage();
		return [];
	}
}

function buscarDuplicado($pdo, $nome, $marca){
	try {
		$query = $pdo->prepare("Select * from material where Nome like ? and Marca like ?");
		$query->execute(array($nome, $marca));
		return $query->fetch();

	} catch (PDOException $e) {
		echo "Erro buscando o producto existente: " . $e->getMessage();
		return [];
	}
}

function insertar($pdo, $nome, $marca, $tipo, $prezo, $imaxe) {
	$productoDuplicado = buscarDuplicado($pdo, $nome, $marca);

	if (!empty($productoDuplicado)) {
		echo "<p>O producto con ese nome e con esa marca xa existe, debes poñer outros</p>";
	}else{
		try {
			$query = $pdo->prepare("INSERT INTO `material`(`Nome`, `Marca`, `Tipo`, `Prezo`, `Imaxe`) VALUES (?,?,?,?,?)");
			$query->execute(array($nome, $marca, $tipo, $prezo, $imaxe));
	
			echo "<p>Producto insertado correctamente</p>";
	
		} catch (PDOException $e) {
			echo "Erro insertando producto: " . $e->getMessage();
		}
	}
}

function modificar($pdo, $nome, $marca, $tipo, $prezo, $imaxe){
	//primero comprobar que exista el producto que quiere modificar
	$productoAModificar = $_GET["textModificarNome"];
	$productoABuscar = $productoAModificar;
	$productoExistente = buscarExistente($pdo, $productoABuscar);

	//y luego comprobar que los valores a modificar no coincidan con la clave de otro
	$productoDuplicado = buscarDuplicado($pdo, $nome, $marca);

	if (empty($productoExistente)) {
		echo "<p>O producto non existe</p>";
	
	}elseif(!empty($productoDuplicado)){
		echo "<p>A marca e o nome xa existe noutro producto, non poden coincidir</p>";

	}else{
		try {
			$query= $pdo->prepare("UPDATE `material` SET `Nome`=?,`Marca`=?,`Tipo`=?,`Prezo`=?,`Imaxe`=? WHERE Nome like ?");

			$nome = !empty($nome) ? $nome : $productoExistente["Nome"]; 
			$marca = !empty($marca) ? $marca : $productoExistente["Marca"];
			$tipo = !empty($tipo) ? $tipo : $productoExistente["Tipo"];
			$prezo = !empty($prezo) ? $prezo : $productoExistente["Prezo"];
			$imaxe = !empty($imaxe) ? $imaxe : $productoExistente["Imaxe"];
	
			$query->execute(array($nome, $marca, $tipo, $prezo, $imaxe, $productoAModificar));
	
			echo "<p>Producto modificado correctamente</p>";
	
		} catch (PDOException $e) {
			echo "Erro modificando producto: " . $e->getMessage();
		}
	}
}

function eliminar($pdo){
	$productoAEliminar = $_GET["textEliminar"];
	$productoABuscar = $productoAEliminar;
	$productoExistente = buscarExistente($pdo, $productoABuscar);

	if (empty($productoExistente)) {
		echo "<p>O producto non existe</p>";
	}else{
		try {
			$query = $pdo->prepare("DELETE FROM `material` WHERE Nome like ?");
			$query->execute(array($productoAEliminar));
			echo "<p>Producto eliminado correctamente.</p>";
	
		} catch (PDOException $e) {
			echo "Erro eliminado producto: " . $e->getMessage();
		}
	}
}

$arrayProductos = [];

$nome = $_GET["textInsertarNome"];
$marca = $_GET["textInsertarMarca"];
$tipo = $_GET["textInsertarTipo"];
$prezo = $_GET["textInsertarPrezo"];
$imaxe = $_GET["textInsertarImaxe"];

if (isset($_GET["boton"])) {
	switch ($_GET["boton"]) {
		case 'listarTodos':
			$arrayProductos = listarTodos($pdo);
			break;
		
		case 'listarOrdenadosMarca':
			$arrayProductos = listarOrdenadosMarca($pdo);
			break;

		case'listarOrdenadosPrezo':
			$arrayProductos = listarOrdenadosPrezo($pdo);
			break;

		case 'buscarPorMarca':
			$arrayProductos =  buscarPorMarca($pdo);
			break;

		case 'buscarPorCualquierCampo':
			$arrayProductos = buscarPorCualquierCampo($pdo);
			break;

		case 'listarPorTipo':
			$arrayProductos = listarPorTipo($pdo);
			break;

		case 'insertar':
			if ($prezo == "" && !is_numeric($prezo)) {
				echo "<p>O prezo debe ser un número válido</p>";
				break;
			}

			$prezo = (int) $_GET["textInsertarPrezo"];

			insertar($pdo, $nome, $marca, $tipo, $prezo, $imaxe);
			$arrayProductos = listarTodos($pdo);
			break;

		case 'modificar':
			if ($prezo != "" && !is_numeric($prezo)) {
				echo "<p>O prezo debe ser un número válido</p>";
				break;
			}
			
			$prezo = (int) $_GET["textInsertarPrezo"];

			modificar($pdo, $nome, $marca, $tipo, $prezo, $imaxe);
			$arrayProductos = listarTodos($pdo);
			break;

		case 'eliminar';
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
		}else{
			echo  "<p>Non se atopan resultados.</p>";
		}
?>
<article>
</body>
</html>