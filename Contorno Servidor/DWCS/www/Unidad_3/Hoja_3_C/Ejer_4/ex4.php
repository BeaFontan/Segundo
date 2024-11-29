<?php
	//Conexión con la base de datos
	$conexion = new mysqli('dbXDebug', 'root', 'root', 'hoja_3');

	if ($conexion->connect_error) {
		die("Non é posible conectar coa BD: ". $conexion->connect_error);
	}

	$conexion->set_charset("utf8");

	$query = $conexion->prepare("SELECT Titulo, Autor, Ano, Duracion, Imaxe FROM tema");

	if (!$query) {
		die("Erro en primer select: " . $conexion->error);
	}

	$query->execute();
	$resultado = $query->get_result();

	//Parte del formulario crud
	if (isset($_GET["boton2"])) {
		$accion = $_GET["boton2"];

		switch ($accion) {
			case 'Añadir canción':
				$titulo = $_GET['titulo'];
				$autor = $_GET['autor'];
				$ano = (int)$_GET['ano'];
				$duracion = (int)$_GET['duracion'];
				$imagen = $titulo;

				$query = $conexion->prepare( "INSERT INTO `tema`(`Titulo`, `Autor`, `Ano`, `Duracion`, `Imaxe`) VALUES (?,?,?,?,?)");
				$query->bind_param('ssiis', $titulo, $autor, $ano, $duracion, $imagen);
				break;
			
			case 'Borrar discos seleccionados':
				$titulo = $_GET['borrado'];

				$query = $conexion->prepare("DELETE FROM `tema` WHERE `titulo`= ?");

				$query->bind_param('s', $titulo);

				break;

			case 'Modificar rexisto Seleccionado':
				$tituloModificar = $_GET['modificado'];
				$titulo = $_GET['titulo2'];
				$autor = $_GET['autor2'];
				$ano = (int)$_GET['ano2'];
				$duracion = (int)$_GET['duracion2'];
		
				$query = $conexion->prepare("UPDATE tema SET Titulo = ?, Autor = ?, Ano = ?, Duracion = ? WHERE Titulo = ?");
				
				$query->bind_param('ssiis', $titulo, $autor, $ano, $duracion, $tituloModificar);
					
				break;
		}

		$query->execute();

		if (!$query) {
			die("Erro en switch " . $conexion->error);
		}

	}

	//Parte de mostrar datos

	$query = $conexion->prepare("SELECT Titulo, Autor, Ano, Duracion, Imaxe FROM tema");
	$query->execute();
	$resultado = $query->get_result();
	

	if (isset($_GET["boton"])) {
		$accion = $_GET["boton"];

		switch ($accion) {
			case 'Lista todos os temas':
				$query = $conexion->prepare("SELECT * FROM tema");
				break;
			
			case 'Listar ordenador polo título':
				$query = $conexion->prepare("SELECT * FROM tema order by Titulo");
				break;
	
			case 'Lista Ordenador polo autor':
				$query = $conexion->prepare("SELECT * FROM tema order by Autor");
				break;
	
			case 'Lista por autor seleccionado':
				if ($_GET["select"] == "The Beatles") {
					$query = $conexion->prepare("SELECT * FROM tema where Autor like 'The Beatles'");

				} elseif ($_GET["select"] == "The Rolling Stones") {
					$query= $conexion->prepare("SELECT * FROM tema where Autor like 'The Rolling Stones'");

				} elseif ($_GET["select"] == "Otros"){
					$query = $conexion->prepare("SELECT * FROM tema where Autor not like 'The Beatles' and Autor not like 'The Rolling Stones'");

				}
				break;
		}

		if (!$query) {
			die("Erro en último select: " . $conexion->error);
		}

		$query->execute();
		$resultado = $query->get_result();
	}

	$conexion->close();
	if ($query) {
		$query->close();
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

	.tema
	{
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
<form action="ex4.php" method="get">
	<input type="submit" name="boton" value="Lista todos os temas">
	<input type="submit" name="boton" value="Listar ordenador polo título">
	<input type="submit" name="boton" value="Lista Ordenador polo autor">
	<input type="submit" name="boton" value="Lista por autor seleccionado">
	<select name="select" >
		<option value="The Beatles">The Beatles</option>
		<option value="The Rolling Stones">The Rolling Stones</option>
		<option value="Otros">Otros</option>
	</select>
</form>

<article id="contenedor">
	<?php
		if ($resultado && $resultado->num_rows > 0) {
			while ($fila = $resultado->fetch_array()) {
			
				$srcImaxe = $fila["Imaxe"] . ".jpg";
	
				echo "<div class='tema'><img src='imaxes/$srcImaxe'><br>
						<div>{$fila["Titulo"]}</div>
						<div>{$fila["Autor"]}</div>
						<div>{$fila["Ano"]}</div>
					</div>";
			}
		}
	?>
<article>
<article>
	<form action="ex4.php" method="get">

		<input type="text" name="titulo" id="titulo" placeholder="Título">
		<input type="text" name="autor" id="autor" placeholder="Autor">
		<input type="text" name="ano" id="ano" placeholder="ano">
		<input type="text" name="duracion" id="duracion" placeholder="Duración">
		<br><br>
		<input type="submit" name="boton2" value="Añadir canción">
		<br>
		<hr>
		<br><br>

		<input type="submit" name="boton2" value="Borrar discos seleccionados">
		<br><br>
		<input type="text" name="borrado" id="borrado" placeholder="Introduce Título a borrar" style="width: 200px">

		<br>
		<hr>
		<br><br>


		<br><br>
		<input type="text" name="modificado" id="modificado" placeholder="Introduce Título a modificar" style="width: 200px">
		<p>Introduce os datos a modificar:</p>
		<input type="text" name="titulo2" id="titulo2" placeholder="Título">
		<input type="text" name="autor2" id="autor2" placeholder="Autor">
		<input type="text" name="ano2" id="ano2" placeholder="ano">
		<input type="text" name="duracion2" id="duracion2" placeholder="Duración">
		<input type="submit" name="boton2" value="Modificar rexisto Seleccionado"> 
		<br><br>
		
	</form>
</article>
</body>
</html>