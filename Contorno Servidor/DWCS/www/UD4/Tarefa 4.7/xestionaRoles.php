<?php

if (!isset($_SESSION["datos"])) {
    header("location:login.php");
    exit;
}

include_once("conexion.php");

//Funciones de administrador
function recuperarUsuarios($pdo)
{
    $rolAdministrador ="administrador";

    try {
        $query = $pdo->prepare("Select * from usuarios where rol not like ?");
        $query->execute([$rolAdministrador]);
        return $query->fetchAll();
    } catch (PDOException $e) {
        return "Erro mostrando os usuarios" . $e->getMessage();
    }
}

function actualizarRol($pdo, $nuevoRol, $idUsuario)
{
    try {
        $query = $pdo->prepare("UPDATE `usuarios` SET `rol`=? WHERE id like ?");
        $query->execute([$nuevoRol, $idUsuario]);
        return "Rol actualizado correctamente";
    } catch (PDOException $e) {
        return "Erro actualzando o rol" . $e->getMessage();
    }
}


if (isset($_POST["btnActualizarRol"])) {

    $nuevoRol = $_POST["selectRol"];
    $idUsuario = $_POST["hiddenIdUsuario"];

    $_SESSION["mensajeRolActualizado"] = actualizarRol($pdo, $nuevoRol, $idUsuario);
    header("location:panelAdmin.php");
    exit;
}           
?>

