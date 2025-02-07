<?php

include_once("conexion.php");

//Crear admin se non existe
try {
    $query = $pdo->prepare("Select nome from usuarios where nome like ?");
    $query->execute(["admin"]);
    $admin = $query->fetch();

    if (empty($admin)) {
        try {
            $query = $pdo->prepare("INSERT INTO `usuarios`(`email`, `contrasinal`, `rol`, `nome`, `apelido1`) VALUES (?,?,?,?,?)");
            $query->execute(["admin@admin.com", password_hash("abc123.", PASSWORD_DEFAULT), "administrador", "admin", "admin"]);
        } catch (PDOException $e) {
            $mensaxe = "Erro creando admin" . $e->getMessage();
        }
    }
} catch (PDOException $e) {
    $mensaxe = "Erro buscando admin" . $e->getMessage();
}


//Registro
if (isset($_POST["btnEnviarRexistro"])) {
    $nome = htmlspecialchars($_POST["txtNomeRexistro"]);
    $apelido1 = htmlspecialchars($_POST["txtApelido1Rexistro"]);
    $apelido2 = htmlspecialchars($_POST["txtApelido2Rexistro"]);
    $email = htmlspecialchars($_POST["txtEmailRexistro"]);
    $contrasinal = htmlspecialchars(password_hash($_POST["txtContrasinalRexistro"], PASSWORD_DEFAULT));
    $rol = "usuario";

    //comprobar que no se repita email
    try {
        $query = $pdo->prepare("Select email from usuarios where email like ?");
        $query->execute([$email]);
        $user = $query->fetch();

        if (!empty($user)) {
            $mensaxe = "O email xa está rexistrado";
            header("location:login.php?mensaxe=$mensaxe");
            exit;

        }else{
            try {
                $query = $pdo->prepare("INSERT INTO `usuarios`(`email`, `contrasinal`, `rol`, `nome`, `apelido1`, `apelido2`) VALUES (?,?,?,?,?,?)");
                $query->execute([$email, $contrasinal, $rol, $nome, $apelido1, $apelido2]);
                header("location:login.php");
                exit;

            } catch (PDOException $e) {
                $mensaxe = "Erro no rexistro" . $e->getMessage();
                header("location:rexistro.html?mensaxe=$mensaxe");
                exit;
            }
        }
    } catch (PDOException $e) {
        $mensaxe = "Erro buscando email existente" . $e->getMessage();
    }

} else {
    header("location:login.php");
    exit;
}


