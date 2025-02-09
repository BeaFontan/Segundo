<?php
include_once("conexion.php");

function recuperarComentariosModerados($pdo, $idProducto)
{
    $moderado = 1;
    try {
        $query = $pdo->prepare("Select * from comentarios where producto_id like ? and moderado like ?");
        $query->execute([$idProducto, $moderado]);
        return $query->fetchAll();
    } catch (PDOException $e) {
        return "Erro mostrando os comentarios moderados" . $e->getMessage();
    }
}

function recuperarComentariosSinModerar($pdo, $idProducto)
{
    $moderado = 0;
    try {
        $query = $pdo->prepare("Select * from comentarios where producto_id like ? and moderado like ?");
        $query->execute([$idProducto, $moderado]);
        return $query->fetchAll();
    } catch (PDOException $e) {
        return "Erro mostrando os comentarios non moderados" . $e->getMessage();
    }
}
?>