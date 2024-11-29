<?php
//FORMULARIO DE BOTOS QUE PASA LA ACCIÓN QUE ESTÁ HACIENDO EL USUARIO, 

//conexión
try {
    $pdo = new PDO("mysql:host=dbXDebug;dbname=senderismo;charset=utf8", 'usuarioProba', 'abc123.');
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Conexión realizada";

} catch (PDPException $e) {
    echo "Erro na conexión á base" . $e->getMessage();
}


//CÓDIGO DE ACCIONES
$arrayProductos="";

if ($_GET["boton"]) {
	$accion = $_GET["boton"];

	switch ($accion) {
		case 'listar':
			try {
				$query = $pdo->query("Select * from material");
				$query->execute();
				$arrayProductos = $query->fetchAll();

			
			} catch (PDOException $e) {
				echo"Erro mostrando todos os productos" . $e->getMessage();
			}
			
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
			echo $marca;

			$query = $pdo->query("Select * from material where Marca like ?");
			//$query->bindParam(1,$marca);
			$query->execute(array($marca));
			//$query->execute();
			$arrayProductos = $query->fetchAll();

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

?>

<article>
</body>
</html>






















