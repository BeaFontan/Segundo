<?php
try {
	$pdo = new PDO("mysql:host=dbXDebug;dbname=Zexamen;charset=utf8", 'root', 'root');
	$pdo->setAttribute(PDO::ERRMODE_EXCEPTION, PDO::ATTR_ERRMODE);
	echo "Conexión realizada";
} catch (PDOException $e) {
	echo "Erro na Conexión".$e->getMessage();
}

function listarTodos($pdo){
	try {
		$query = $pdo->query("Select * from material");
		$query->execute();
		return $query->fetchAll();

	} catch (PDOException $e) {
		echo "Erro na Conexión".$e->getMessage();
	}
}

function listarPorMarca($pdo){
	try {
		$query = $pdo->query("Select * from material order by Marca");
		$query->execute();
		return $query->fetchAll();

	} catch (PDOException $e) {
		echo "Erro na Conexión".$e->getMessage();
	}
}

function listarPorPrezo($pdo){
	try {
		$query = $pdo->query("Select * from material order by Prezo");
		$query->execute();
		return $query->fetchAll();

	} catch (PDOException $e) {
		echo "Erro na Conexión".$e->getMessage();
	}
}

function buscarPorMarca($pdo){
	try {
		$marcaABuscar = $_GET["textBuscarMarca"];
		$query = $pdo->prepare("Select * from material where Marca like ?");
		$query->execute(array($marcaABuscar));
		return $query->fetchAll();

	} catch (PDOException $e) {
		echo "Erro na Conexión".$e->getMessage();
	}
}

function buscarPorCalquerCampo($pdo){
	try {
		$campoABuscar = $_GET["textBuscarCalquerCampo"];
		$query = $pdo->prepare("Select * from material where Marca like ? or Nome like ? or Tipo like ? or Prezo like ? or Imaxe like ?");
		$query->execute(array($campoABuscar, $campoABuscar, $campoABuscar, $campoABuscar, $campoABuscar));
		return $query->fetchAll();

	} catch (PDOException $e) {
		echo "Erro na Conexión".$e->getMessage();
	}
}

function buscarTipoSeleccionado($pdo){
	try {
		$tipoSeleccionado = $_GET["selectPorTipo"];
		$query = $pdo->prepare("Select * from material where Tipo like ?");
		$query->execute(array($tipoSeleccionado));
		return $query->fetchAll();

	} catch (PDOException $e) {
		echo "Erro na Conexión".$e->getMessage();
	}
}

function buscarDuplicado($pdo, $nome, $marca){
	try {
		$query = $pdo->prepare("Select * from material where Nome like ? and Marca like ?");
		$query->execute(array($nome,$marca));
		return $query->fetchAll();

	} catch (PDOException $e) {
		echo "Erro na Conexión".$e->getMessage();
	}
}

function buscarExistente($pdo, $nome){
	try {
		$query = $pdo->prepare("Select * from material where Nome like ?");
		$query->execute(array($nome));
		return $query->fetch();

	} catch (PDOException $e) {
		echo "Erro na Conexión".$e->getMessage();
	}
}

function insertar($pdo, $nome, $marca, $tipo, $prezo, $imaxe){
	$productoDuplicado = buscarDuplicado($pdo, $nome, $marca);
	if (!empty($productoDuplicado)) {
		echo "<p>Xa existe un producto con ese nome e esa Marca, non poden ser iguales</p>";
	}else{
		try {
			$query = $pdo->prepare("INSERT INTO `material`(`Nome`, `Marca`, `Tipo`, `Prezo`, `Imaxe`) VALUES (?,?,?,?,?)");
			$query->execute(array($nome, $marca, $tipo, $prezo, $imaxe));
	
		} catch (PDOException $e) {
			echo "Erro na Conexión".$e->getMessage();
		}
	}
}

function modificar($pdo, $nome, $marca, $tipo, $prezo, $imaxe, $productoAModificar){

	$productoExistente = buscarExistente($pdo, $productoAModificar);

	try {
		$query = $pdo->prepare("UPDATE `material` SET `Nome`=?,`Marca`=?,`Tipo`=?,`Prezo`=?,`Imaxe`=? WHERE Nome like ?");

		$nome = !empty($nome) ? $nome : $productoExistente["Nome"];
		$marca = !empty($marca) ? $marca : $productoExistente["Marca"];
		$tipo = !empty($tipo) ? $tipo : $productoExistente["Tipo"];
		$prezo = !empty($prezo) ? $prezo : $productoExistente["Prezo"];
		$imaxe = !empty($pimaxerezo) ? $imaxe : $productoExistente["Imaxe"];

		$query->execute(array($nome, $marca, $tipo, $prezo, $imaxe, $productoAModificar));

	} catch (PDOException $e) {
		echo "Erro na Conexión".$e->getMessage();
	}
}

function eliminar($pdo, $productoAEliminar){
	try {
		$query = $pdo->prepare("DELETE FROM `material` WHERE Nome like ?");
		$query->execute(array($productoAEliminar));

	} catch (PDOException $e) {
		echo "Erro na Conexión".$e->getMessage();
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
			$productos = listarTodos($pdo);
			break;
		
		case 'listarPorMarca':
			$productos = listarPorMarca($pdo);
			break;

		case 'listarPorPrezo':
			$productos = listarPorPrezo($pdo);
			break;

		case 'buscarPorMarca':
			$productos = buscarPorMarca($pdo);
			break;

		case 'buscarPorCalquerCampo':
			$productos = buscarPorCalquerCampo($pdo);
			break;

		case 'buscarTipoSeleccionado':
			$productos = buscarTipoSeleccionado($pdo);
			break;

		case 'insertar':
			if ($nome == "" || $marca == "") {
				echo "<p>Debes cumplimentar o nome e a marca</p>";
			} elseif ($prezo == "" || !is_numeric($prezo)) {
				echo "<p>O prezo non é valido</p>";
			}else {
				$prezo = (int) $prezo;
				insertar($pdo, $nome, $marca, $tipo, $prezo, $imaxe);
				$productos = listarTodos($pdo);
			}
			break;

		case 'modificar':
			if ($prezo != "" && !is_numeric($prezo)) {
				echo "<p>O prezo non é valido</p>";
			}else {
				$productoAModificar = $_GET["selectModificarYBorrar"];
				$prezo = (int) $prezo;
				modificar($pdo, $nome, $marca, $tipo, $prezo, $imaxe, $productoAModificar);
				$productos = listarTodos($pdo);
			}
			break;

		case 'eliminar':
			$productoAEliminar = $_GET["selectModificarYBorrar"];
			eliminar($pdo, $productoAEliminar);
			$productos = listarTodos($pdo);
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
	if (!empty($productos)) {
		foreach ($productos as $producto) {
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






















