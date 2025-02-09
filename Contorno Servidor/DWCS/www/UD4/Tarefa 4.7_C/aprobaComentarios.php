<?php
session_start();

include_once("conexion.php");

function aprobarComentario($pdo, $idComentario)
{
    $moderado = 1;
    $dataModeracion = Date("Y-m-d H:i:s");
    try {
        $query = $pdo->prepare("UPDATE `comentarios` SET `moderado`=?, `data_moderacion`=? WHERE id = ?");
        $query->execute([$moderado, $dataModeracion, $idComentario]);
        return "Comentario aprobado";
    } catch (PDOException $e) {
        return "Erro aprobando comentario" . $e->getMessage();
    }
}

function eliminarComentario($pdo, $idComentario)
{
    try {
        $query = $pdo->prepare("DELETE FROM `comentarios` WHERE id = ?");
        $query->execute([$idComentario]);
        return "Comentario eliminado";
    } catch (PDOException $e) {
        return "Erro eliminando comentario" . $e->getMessage();
    }
}

if (isset($_POST["btnAprobarComentario"])) {
    $idComentario = $_POST["hiddenIdComentario"];

    $mensaxe = aprobarComentario($pdo, $idComentario);

    $_SESSION["mensaxe"] = $mensaxe;
    header("Location:mostra.php");
    exit;

} elseif (isset($_POST["btnEliminarComentario"])) {
    $idComentario = $_POST["hiddenIdComentario"];

    $mensaxe = eliminarComentario($pdo, $idComentario);

    $_SESSION["mensaxe"] = $mensaxe;
    header("Location:mostra.php");
    exit;

} else {
    header("Location:login.php");
    exit;
}
?>