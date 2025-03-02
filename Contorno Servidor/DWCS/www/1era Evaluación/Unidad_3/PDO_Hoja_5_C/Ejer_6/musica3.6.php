<?php

//CONEXIÓN BASE 

try {
    $pdo = new PDO ("mysql:host=dbXDebug;dbname=musica;charset=utf8", 'root', 'root');

    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    echo "Conecxión realizada con éxito";


} catch (PDOException $e) {
    echo "Problema al realizar la conexión" . $e->getMessage();
}

//Listar los temas

try {
    $queryDiscos = $pdo->query("Select * from tema");
    $queryDiscos->execute();
    $arrayDiscos = $queryDiscos->fetchAll();
} catch (PDOException $e) {
    echo "Erro mostrando todos os discos";
}

//Botones

if (isset($_GET["boton"])) {
    $accion = $_GET["boton"];

    switch ($accion) {
        case 'Lista todos os temas':
            $query = $pdo->query("Select * from tema");

            break;
        
        case 'Listar ordenador polo título':
            $query = $pdo->query("Select * From tema order by Titulo");
            break;

        case 'Lista Ordenador polo autor':
            $query = $pdo->query("SELECT * FROM tema order by Autor");
            break;

        case 'Lista por autor seleccionado':
            if ($_GET["select"] == "The Beatles") {
                $query = $pdo->query("SELECT * FROM tema where Autor like 'The Beatles'");

            } elseif ($_GET["select"] == "The Rolling Stones") {
                $query= $pdo->query("SELECT * FROM tema where Autor like 'The Rolling Stones'");

            } elseif ($_GET["select"] == "Otros"){
                $query = $pdo->query("SELECT * FROM tema where Autor not like 'The Beatles' and Autor not like 'The Rolling Stones'");
            }
            break;
    }

    if ($query) {
        $query->execute();
        $arrayDiscos = $query->fetchAll();
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
<form action="musica3.6.php" method="get">
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

        foreach ($arrayDiscos as $disco) {
            $srcImaxe = $disco[4] . ".jpg";
	
            echo "<div class='tema'><img src='imaxes/$srcImaxe'><br>
                    <div>{$disco[0]}</div>
                    <div>{$disco[1]}</div>
                    <div>{$disco[2]}</div>
                    <div>{$disco[3]}</div>
                </div>";
        }
		
	?>
</article>
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