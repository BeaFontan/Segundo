<?php
if (!isset($_SESSION["datos"])) {
    header("location:login.php");
    exit;
}

include_once("conexion.php");

function recuperarComentarios($pdo, $idProducto)
{
    try {
        $query = $pdo->prepare("Select * from comentarios where producto_id like ?");
        $query->execute([$idProducto]);
        return $query->fetchAll();
    } catch (PDOException $e) {
        return "Erro mostrando os comentarios" . $e->getMessage();
    }
}

?>