<?php
session_start();

include_once("conexion.php");

function recurarUsuarios($pdo)
{
    try {
        $query = $pdo->query("Select * from usuarios");
        $query->execute();
        return $query->fetchAll();
    
    } catch (PDOException $e) {
        return "Erro mostrando os usuarios" . $e->getMessage();
    }
}

function recuperarProductos($pdo)
{
    try {
        $query = $pdo->query("Select * from productos");
        $query->execute();
        return $query->fetchAll();
    
    } catch (PDOException $e) {
        return "Erro mostrando os productos" . $e->getMessage();
    }
}

function recuperarComentarios($pdo, $idProducto)
{
    $moderado = 1;
    try {
        $query = $pdo->prepare("Select * from comentarios where producto_id like ? and moderado like ?");
        $query->execute([$idProducto, $moderado]);
        return $query->fetchAll();
    
    } catch (PDOException $e) {
        return "Erro mostrando os comentarios" . $e->getMessage();
    }
}

function agregarComentario($pdo,$idUsuario, $idProducto, $comentario, $moderado, $dataCreacion){
    try {
        $query = $pdo->prepare("INSERT INTO `comentarios`(`usuario_id`, `producto_id`, `comentario`, `moderado`, `data_creacion`) VALUES (?,?,?,?,?)");
        $query->execute([$idUsuario, $idProducto, $comentario, $moderado, $dataCreacion]);
        return "Comentario enviado, pendente de moderación.";
    
    } catch (PDOException $e) {
        return "Erro Insertando producto" . $e->getMessage();
    }   
}



//Modulos por roles
if (strcmp($_SESSION["datos"]["rol"], "administrador") == 0) {
    $arrayUsuarios = recurarUsuarios($pdo);

}elseif (strcmp($_SESSION["datos"]["rol"], "moderador") == 0)  {
    # code...
}else{

    $arrayProductos = recuperarProductos($pdo);

    //Añadir comentario por usuario
    if(isset($_POST["btnAgregarComentario"])){
        $idUsuario = $_SESSION["datos"]["id"];
        $idProducto = htmlspecialchars($_POST["hiddenIdProducto"]);
        $comentario = htmlspecialchars($_POST["txtComentario"]);
        $moderado = 0;
        $dataCreacion = Date("Y-m-d H:i:s");

        $_SESSION["mensajeEnviadoPteMod"] = agregarComentario($pdo,$idUsuario, $idProducto, $comentario, $moderado, $dataCreacion);
        header("Location: mostra.php");
        exit();
    }
}?>

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
    ?>
</h2>
<h2>
    <?php
    if (isset($_SESSION["mensajeEnviadoPteMod"])) {
        echo $_SESSION["mensajeEnviadoPteMod"];
        unset($_SESSION["mensajeEnviadoPteMod"]);
    }
    ?>
</h2>

<div class="container">
<?

if (!empty($arrayProductos)) {
    foreach ($arrayProductos as $producto) {
        $arrayComentarios = recuperarComentarios($pdo, $producto["id"]);

        $comentarioIndividual = "";

        if (!empty($arrayComentarios)) {
            foreach ($arrayComentarios as $comentario) {
                $comentarioIndividual .= '<p>'.$comentario["comentario"].'</p>';
            }
        }

        echo '
            <div class="card">
                <h2>' . $producto["nome"] . '</h2>
                <div>' . $producto["descripcion"] . '</div>
                <img class="img" src="' . $producto["imaxe"] . '" alt="' . $producto["nome"] . '">
                '.$comentarioIndividual.'
                <form method="post">
                    <input type="hidden" name="hiddenIdProducto" value="' . $producto["id"] . '">
                    <input type="text" name="txtComentario" h>
                    <button type="submit" name="btnAgregarComentario">Añadir comentario</button>
                </form>
            </div>';
    }
}
?>
</div>

<div>
    <table>
        <tr>
            <th>Email</th>
            <th>Nome</th>
            <th>Apelido1</th>
            <th>Apelido2</th>
            <th>Rol</th>
            <th>Ultima conexion</th>
        </tr>

        <?php
            if (!empty($arrayUsuarios)) {
                foreach ($arrayUsuarios as $usuario) {
                     echo '<tr>
                        <td>'.$usuario["email"].'</td>
                        <td>'.$usuario["nome"].'</td>
                        <td>'.$usuario["apelido1"].'</td>
                        <td>'.$usuario["apelido2"].'</td>
                        <td>'.$usuario["rol"].'</td>
                        <td>'.$usuario["ultima_conexion"].'</td>
                     </tr>';
                }
            }
            ?>

    </table>
</div>

</body>
</html>