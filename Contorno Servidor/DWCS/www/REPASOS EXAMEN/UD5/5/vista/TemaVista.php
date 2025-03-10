<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    function mostrarMensaxe($mensaxe): void
    {
        if (isset($mensaxe)) {
            echo "<p>$mensaxe</p>";
        }
    }


    function buscarTituloHTMl(): void
    {
        echo '
            <form action="TemaControlador.php" method="post">
                <h1>Buscar por título</h1>
                <input type="text" name="txtTitulo" placeholder="Título a buscar"><br><br>
                <button type="submit" name="btnBuscar">Buscar</button>
            </form>';
    }


    function insertarHTMl(): void
    {
        echo '
        <form action="TemaControlador.php" method="post">
            <h1>Insertar</h1>
            <input type="text" name="txtTitulo" placeholder="Título"><br>
            <input type="text" name="txtAutor" placeholder="Autor"><br>
            <input type="number" name="txtAno" placeholder="Ano"><br>
            <input type="number" name="txtDuracion" placeholder="Duracion"><br><br>

            <button type="submit" name="btnInsertar">Insertar</button>
        </form>';
    }


    function eliminarHTML(): void
    {
        echo '
        <form action="TemaControlador.php" method="post">
            <h1>Eliminar</h1>
            <input type="text" name="txtTitulo" placeholder="Título a Eliminar"><br><br>
            <button type="submit" name="btnEliminar">Eliminar</button>
        </form>';
    }


    function editarHTML(): void
    {
        echo '
        <form action="TemaControlador.php" method="post">
            <h1>Modificar</h1>
            <input type="text" name="txtTituloEditar" placeholder="Título a editar"><br><br>

            <input type="text" name="txtTitulo" placeholder="Título"><br>
            <input type="text" name="txtAutor" placeholder="Autor"><br>
            <input type="number" name="txtAno" placeholder="Ano"><br>
            <input type="number" name="txtDuracion" placeholder="Duracion"><br><br>

            <button type="submit" name="btnEditar">Editar</button>
        </form>';
    }

    function mostrarTodosHTML(array $arrayTemas): void
    {
        if (!empty($arrayTemas)) {
            foreach ($arrayTemas as $tema) {
                $imaxe = $tema["Imaxe"] . ".jpg";
                echo '
                    <br><br><br><div>
                        <div>'.$tema["Titulo"].'</div>
                        <div>'.$tema["Autor"].'</div>
                        <div>'.$tema["Ano"].'</div>
                        <div>'.$tema["Duracion"].'</div>
                        <img src="imaxes/'.$imaxe.'" alt="'.$tema["Duracion"].'">
                    </div>
                ';
            }
        }
    }

    ?>
</body>

</html>