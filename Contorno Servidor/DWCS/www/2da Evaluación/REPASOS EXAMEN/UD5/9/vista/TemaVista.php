<?php declare(strict_types=1);?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php

    function mostrarMensaxeHTML($mensaxe): void
    {
        if (isset($mensaxe)) {
            echo "<p>$mensaxe</p>";
        }
    }



    function buscarTituloHTML(): void
    {
        echo '
        <form action="TemaControlador.php" method="post">
            <h1>Buscar por título</h1>
            <input type="text" name="txtTituloBuscar" placeholder="Titulo a buscar"><br>
            <button type="submit" name="btnBuscar">Buscar</button>
        </form><br>
        ';
    }


    function insertarHTML(): void
    {
        echo '
        <form action="TemaControlador.php" method="post">
            <h1>Insertar</h1>
            <input type="text" name="txtTitulo" placeholder="Titulo"><br>
            <input type="text" name="txtAutor" placeholder="Autor"><br>
            <input type="number" name="txtAno" placeholder="Ano"><br>
            <input type="number" name="txtDuracion" placeholder="Duracion"><br>
            <button type="submit" name="btnInsertar">Inserta</button>
        </form><br>
        ';
    }


    
    function eliminarHTML(): void
    {
        echo '
        <form action="TemaControlador.php" method="post">
            <h1>Eliminar por título</h1>
            <input type="text" name="txtTituloEliminar" placeholder="Titulo a buscar"><br>
            <button type="submit" name="btnBEliminar">Eliminar</button>
        </form><br>
        ';
    }


    function editarHTML(): void
    {
        echo '
        <form action="TemaControlador.php" method="post">
            <h1>Editar</h1>
            <input type="text" name="txtTituloEditar" placeholder="Titulo a Editar"><br><br>

            <input type="text" name="txtTitulo" placeholder="Titulo"><br>
            <input type="text" name="txtAutor" placeholder="Autor"><br>
            <input type="number" name="txtAno" placeholder="Ano"><br>
            <input type="number" name="txtDuracion" placeholder="Duracion"><br>
            <button type="submit" name="btnEditar">Editar</button>
        </form><br>
        ';
    }


    function mostrarTodosHTML(array $arrayTemas): void
    {
        if (!empty($arrayTemas)) {
            foreach ($arrayTemas as $tema) {
                $imaxe = "imaxes/".$tema["Imaxe"].".jpg";

                echo '
                    <div>
                        <div>'.$tema["Titulo"].'</div>
                        <div>'.$tema["Autor"].'</div>
                        <div>'.$tema["Ano"].'</div>
                        <div>'.$tema["Duracion"].'</div>
                        <img src="'.$imaxe.'" alt="'.$tema["Titulo"].'">
                    </div><br><br>
                ';
            }
        }
    }

    ?>
</body>

</html>