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

    function mostrarMensaxe($mensaxe): void
    {
        if (isset($mensaxe)) {
            echo $mensaxe;
        }
    }

    function formBuscarPorTitulo(): void
    {
        echo '
            <h1>Buscar por título</h1>
            <form action="temaControlador.php" method="post">
                <input type="text" name="txtBuscarTitulo" placeholder="Introduce o tema a buscar"><br>
                <button type="submit" name="btnBuscarTitulo">Buscar</button>
            </form>';
    }

    function formInsertar(): void
    {
        echo '
            <h1>Agregar tema</h1>
            <form action="temaControlador.php" method="post">
                <input type="text" name="txtTitulo" placeholder="Titulo"><br>
                <input type="text" name="txtAutor" placeholder="Autor"><br>
                <input type="number" name="txtAno" placeholder="Ano"><br>
                <input type="number" name="txtDuracion" placeholder="Duración"><br>
                <button type="submit" name="btnInsertar">Insertar</button>
            </form>';
    }

    function formBorrar(): void
    {
        echo '
            <h1>Borrar por título</h1>
            <form action="temaControlador.php" method="post">
                <input type="text" name="txtEliminarTitulo" placeholder="Titulo a eliminar"><br>
                <button type="submit" name="btnEliminar">Eliminar</button>
            </form>';
    }

    function formActualizar(): void
    {
        echo '
            <h1>Actualizar por título</h1>
            <form action="temaControlador.php" method="post">
                <input type="text" name="txtTemaActualizar" placeholder="Introduce título a modificar"><br><br>
                <input type="text" name="txtActualizarTitulo" placeholder="Titulo"><br>
                <input type="text" name="txtActualizarAutor" placeholder="Autor"><br>
                <input type="number" name="txtActualizarAno" placeholder="Ano"><br>
                <input type="number" name="txtActualizarDuracion" placeholder="Duración"><br>
                <input type="text" name="txtActualizarImaxe" placeholder="Imaxe"><br>
                <button type="submit" name="btnActualizar">Actualizar</button>
            </form>';
    }

    function mostrarDatosHTML($arrayTemas): void
    {
        if (!empty($arrayTemas)) {
            foreach ($arrayTemas as $tema) {
                $srcImaxe = $tema[4] . ".jpg";

                echo "<article id='contenedor'>
                    <div class='tema'>
                        <img src='imaxes/$srcImaxe'><br>
                        <div>{$tema[0]}</div>
                        <div>{$tema[1]}</div>
                        <div>{$tema[2]}</div>
                        <div>{$tema[3]}</div>
                    </div>
                </article>";

            }
        }
    }
    ?>
</body>
</html>