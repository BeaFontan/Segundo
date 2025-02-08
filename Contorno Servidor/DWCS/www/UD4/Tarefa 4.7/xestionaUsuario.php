<?php

if (!isset($_SESSION["datos"])) {
    header("location:login.php");
    exit;
}

include_once("conexion.php");

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

function agregarComentario($pdo, $idUsuario, $idProducto, $comentario, $moderado, $dataCreacion)
{
    try {
        $query = $pdo->prepare("INSERT INTO `comentarios`(`usuario_id`, `producto_id`, `comentario`, `moderado`, `data_creacion`) VALUES (?,?,?,?,?)");
        $query->execute([$idUsuario, $idProducto, $comentario, $moderado, $dataCreacion]);
        return "Comentario enviado, pendente de moderación.";
    } catch (PDOException $e) {
        return "Erro Insertando producto" . $e->getMessage();
    }
}
?>