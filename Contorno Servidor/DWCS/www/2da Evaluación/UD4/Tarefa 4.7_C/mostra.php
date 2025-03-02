<?php
session_start();

if (isset($_SESSION["datos"]) && !isset($_SESSION['marcadecontrol'])) {
    session_regenerate_id(true);
    $_SESSION['marcadecontrol'] = true;
}

//Usuario Administrador
if (isset($_SESSION["datos"]) && strcmp($_SESSION["datos"]["rol"], "administrador") == 0) {
    header("location:panelAdmin.php");
    exit;
}

include_once("xestionaUsuario.php");
include_once("xestionaComentarios.php");

// Parte publica
$arrayProductos = recuperarProductos($pdo);

//Usuario regitrado
if (isset($_POST["btnAgregarComentario"]) && isset($_SESSION["datos"]) && strcmp($_SESSION["datos"]["rol"], "usuario") == 0) {
    $idUsuario = $_SESSION["datos"]["id"];
    $idProducto = $_POST["hiddenIdProducto"];
    $comentario = htmlspecialchars($_POST["txtComentario"]);
    $moderado = 0;
    $dataCreacion = date("Y-m-d H:i:s");

    $mensaxe = agregarComentario($pdo, $idUsuario, $idProducto, $comentario, $moderado, $dataCreacion);
    $_SESSION["mensaxe"] = $mensaxe;

    header("Location:mostra.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Productos</title>
    <link rel="stylesheet" href="estilo.css">
</head>

<body>

    <div class="titulos">
        <h2>
            <?php
            if (isset($_SESSION["datos"])) {
                if (isset($_COOKIE["idioma_usuario"])) {
                    if (strcmp($_COOKIE["idioma_usuario"], "castellano") == 0) {
                        echo 'Hola ' . $_SESSION["datos"]["nome"] . '!';
                    } elseif (strcmp($_COOKIE["idioma_usuario"], "galego") == 0) {
                        echo 'Boas ' . $_SESSION["datos"]["nome"] . '!';
                    } else {
                        echo 'Hello ' . $_SESSION["datos"]["nome"] . '!';
                    }
                }

                if (isset($_SESSION["mensaxe"])) {
                    echo '<br>' . $_SESSION["mensaxe"];
                    unset($_SESSION["mensaxe"]);
                }
            } else {
                echo '<a class="link" href="login.php">Inicia sesión para comentar</a>';
            } ?>
        </h2>
    </div>

    <?php if (isset($_SESSION["datos"])): ?>
        <form action="pechasesion.php" method="post">
            <div class="elementos-menu">
                <button type="submit" name="btnPecharSesion">Cerrar sesión</button>
            </div>
        </form>
    <?php endif; ?>

    <div class="container">
        <?php
        if (!empty($arrayProductos)) {
            foreach ($arrayProductos as $producto) {

                //Usuario público
                $arrayComentarios = recuperarComentariosModerados($pdo, $producto["id"]);
                $comentarioIndividual = "";

                if (!empty($arrayComentarios)) {
                    foreach ($arrayComentarios as $comentario) {
                        $comentarioIndividual .= '<p class="textoComentario">' . $comentario["comentario"] . '</p>';
                    }
                }

                echo '<div class="card">
                        <h2>' . $producto["nome"] . '</h2>
                        <div class="div">' . $producto["descripcion"] . '</div>
                        <img class="img" src="' . $producto["imaxe"] . '" alt="' . $producto["nome"] . '">
                        
                        ' . $comentarioIndividual . '
                ';

                //Usuarios registrado
                if (isset($_SESSION["datos"]) && strcmp($_SESSION["datos"]["rol"], "usuario") == 0) {
                    echo '<form method="post">
                            <input type="hidden" name="hiddenIdProducto" value="' . $producto["id"] . '">
                            <input type="text" name="txtComentario">
                            <button type="submit" name="btnAgregarComentario">Añadir comentario</button>
                        </form>';
                }

                //Usuarios moderador
                if (isset($_SESSION["datos"]) && strcmp($_SESSION["datos"]["rol"], "moderador") == 0) {
                    $arrayComentariosSinModerar = recuperarComentariosSinModerar($pdo, $producto["id"]);

                    if (!empty($arrayComentariosSinModerar)) {
                        echo '<div class="moderacion-container">';
                        foreach ($arrayComentariosSinModerar as $comentario) {
                            echo '<div class="comentarioModerador">
                                    <p class="textoComentario">' . htmlspecialchars($comentario["comentario"]) . '</p> 
                                    <form action="aprobaComentarios.php" method="post">
                                        <input type="hidden" name="hiddenIdComentario" value="' . $comentario["id"] . '">
                                        <button class="buttonAprobar" type="submit" name="btnAprobarComentario">Aprobar</button>
                                        <button class="buttonAprobar" type="submit" name="btnEliminarComentario">Eliminar</button>
                                    </form>
                                  </div>';
                        }
                        echo '</div>';
                    }
                }
                echo '</div>';
            }
        } ?>
    </div>
</body>

</html>