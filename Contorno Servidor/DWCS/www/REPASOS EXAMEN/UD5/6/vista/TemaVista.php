<?php declare(strict_types=1); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php

    function mostrarMensaxe(string $mensaxe): void
    {
        if (isset($mensaxe)) {
            echo "<p>$mensaxe</p>";
        }
    }


    function buscarTitulo(): void
    {
        echo '<form action="TemaControlador.php" method="post">
                <h1>Buscar por Título</h1>
                <input type="text" name="txtTituloBuscar" placeholder="Título a buscar"><br><br>
                <button type="submit" name="btnBuscar">Buscar</button>
            </form>';

    }

    function insertarTitulo(): void
    {
        echo '<form action="TemaControlador.php" method="post">
                <h1>Insertar</h1>
                <input type="text" name="txtTitulo" placeholder="Titulo"><br>
                <input type="text" name="txtAutor" placeholder="Autor"><br>
                <input type="number" name="txtAno" placeholder="Ano"><br>
                <input type="number" name="txtDuracion" placeholder="Duración">
                <br><br>
                <button type="submit" name="btnInsertar">Insertar</button>
            </form>';
    }


    function eliminar(): void
    {
        echo '<form action="TemaControlador.php" method="post">
                <h1>Eliminar por Título</h1>
                <input type="text" name="txtTituloEliminar" placeholder="Título a buscar"><br><br>
                <button type="submit" name="btnEliminar">Eliminar</button>
            </form>';

    }


    function editar(): void
    {
        echo '<form action="TemaControlador.php" method="post">
                <h1>Editar</h1>
                <input type="text" name="txtTituloEditar" placeholder="Titulo a Editar"><br><br>
                <input type="text" name="txtTitulo" placeholder="Titulo"><br>
                <input type="text" name="txtAutor" placeholder="Autor"><br>
                <input type="number" name="txtAno" placeholder="Ano"><br>
                <input type="number" name="txtDuracion" placeholder="Duración">
                <br><br>
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
                        <div>' . $tema["Titulo"] . '</div>
                        <div>' . $tema["Autor"] . '</div>
                        <div>' . $tema["Ano"] . '</div>
                        <div>' . $tema["Duracion"] . '</div>
                        <img src="imaxes/' . $imaxe . '" alt="' . $tema["Duracion"] . '">
                    </div>';
            }
        }
    }
?>
</body>

</html>