<?php
    declare(strict_types=1);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        #contenedor {
            width: 30%;
            margin: 20px auto;
            background-color: white;
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            grid-gap: 5px;
        }

        .tema {
            height: 210px;
            background-color: white;
            border: 1px black solid;
            text-align: center;
            padding-top: 20px;
            font-family: Arial;
        }

        img {
            width: 130px;
            height: 130px;
        }
    </style>
</head>
<body>
    <?php

    function mostrarMensaxe(string $mensaxe): void
    {
        if (isset($mensaxe)) {
            echo "<p>$mensaxe</p>";
        }
    }



    function buscarPorTituloHTML(): void
    {
        echo'
            <h1>Buscar por título</h1>
            <form action="TemaControlador.php" method="post">    
                <input type="text" name="txtTituloBuscar" placeholder="Título a buscar"><br><br>
                <button type="submit" name="btnBuscar">Buscar</button>
            </form>';
    }



    function insertarHTML(): void
    {
        echo'
            <h1>Insertar un tema</h1>
            <form action="TemaControlador.php" method="post">    
                <input type="text" name="txtTitulo" placeholder="Título"><br>
                <input type="text" name="txtAutor" placeholder="Autor"><br>
                <input type="number" name="txtAno" placeholder="Ano"><br>
                <input type="number" name="txtDuracion" placeholder="Duración"><br><br>
                <button type="submit" name="btnInsertar">Insertar</button>
            </form>';
    }



    function borrrarHTML(): void
    {
        echo'
            <h1>Borrar un tema</h1>
            <form action="TemaControlador.php" method="post">    
                <input type="text" name="txtTituloEliminar" placeholder="Título a borrar"><br><br>
                <button type="submit" name="btnBorrar">Borrar</button>
            </form>';
    }



    function actualizarHTML(): void
    {
        echo'
            <h1>Actualizar un tema</h1>
            <form action="TemaControlador.php" method="post"> 
                <input type="text" name="txtTituloActualizar" placeholder="Título a actualizar"><br> <br>

                <input type="text" name="txtTitulo" placeholder="Título"><br>
                <input type="text" name="txtAutor" placeholder="Autor"><br>
                <input type="number" name="txtAno" placeholder="Ano"><br>
                <input type="number" name="txtDuracion" placeholder="Duración"><br><br>
                <button type="submit" name="btnActualizar">Actualizar</button>
            </form>';
    }




    function mostrarTodosHTMl(array $arrayTemas): void
    {
        if ($arrayTemas) {
            foreach ($arrayTemas as $tema) {
                $imaxe = $tema["Imaxe"] . ".jpg";
                echo "<article id='contenedor'>
                        <div class='tema'>
                            <img src='imaxes/$imaxe'><br>
                            <div>{$tema["Titulo"]}</div>
                            <div>{$tema["Autor"]}</div>
                            <div>{$tema["Ano"]}</div>
                            <div>{$tema["Duracion"]}</div>
                        </div>
                    </article>";
            }
        }
    }
    ?>


</body>
</html>