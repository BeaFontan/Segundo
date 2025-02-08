<?php
session_start();

if (!isset($_SESSION["datos"])) {
    header("location:login.php");
    exit;
}

include_once("xestionaUsuario.php");
include_once("xestionaComentarios.php");


if (strcmp($_SESSION["datos"]["rol"], "administrador") == 0) {
    header("location:panelAdmin.php");
    exit;
}else{
    $arrayProductos = recuperarProductos($pdo);

    //Añadir comentario por usuario
    if (isset($_POST["btnAgregarComentario"])) {
        $idUsuario = $_SESSION["datos"]["id"];
        $idProducto = htmlspecialchars($_POST["hiddenIdProducto"]);
        $comentario = htmlspecialchars($_POST["txtComentario"]);
        $moderado = 0;
        $dataCreacion = Date("Y-m-d H:i:s");

        $_SESSION["mensajeEnviadoPteMod"] = agregarComentario($pdo, $idUsuario, $idProducto, $comentario, $moderado, $dataCreacion);
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Productos</title>
    <link rel="stylesheet" href="estilo.css">
</head>

<body>

    <form action="pechasesion.php" method="post">
        <div class="elementos-menu">
            <button type="submit" name="btnPecharSesion">Pechar sesión</button>
        </div>

    </form>

    <h2>
        <?php
            if (!empty($mensaxe)) {
                echo "$mensaxe";
            }

            if (isset($_SESSION["mensajeEnviadoPteMod"])) {
                echo $_SESSION["mensajeEnviadoPteMod"];
                unset($_SESSION["mensajeEnviadoPteMod"]);
            }
        ?>
    </h2>

    <div class="container">
        <?php
            if (!empty($arrayProductos)) {
                foreach ($arrayProductos as $producto) {
                    $arrayComentarios = recuperarComentarios($pdo, $producto["id"]);

                    $comentarioIndividual = "";

                    if (!empty($arrayComentarios)) {
                        foreach ($arrayComentarios as $comentario) {

                            if (!$comentario["moderado"]) {
                                $comentarioIndividual .= '<p>' . $_SESSION["datos"]["nome"] . ": " .$comentario["comentario"] . '</p>';
                            }
                            

                            $comentarioIndividual .= '<p>' . $_SESSION["datos"]["nome"] . ": " .$comentario["comentario"] . '</p>';
                        }
                    }

                    echo '<div class="card">
                            <h2>' . $producto["nome"] . '</h2>
                            <div>' . $producto["descripcion"] . '</div>
                            <img class="img" src="' . $producto["imaxe"] . '" alt="' . $producto["nome"] . '">
                            
                            <form method="post">
                                <input type="hidden" name="hiddenIdProducto" value="' . $producto["id"] . '">
                                <input type="text" name="txtComentario" h>
                                <button type="submit" name="btnAgregarComentario">Añadir comentario</button>
                            </form>

                            ' . $comentarioIndividual . '
                        </div>';
                }
            }
        ?>
    </div>
</body>
</html>