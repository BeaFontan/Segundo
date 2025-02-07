<?php

include("conexion.php");

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


if (isset($_GET["mensaxe"])) {
    echo "<p>".$_GET["mensaxe"]."</p>";
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
    <a href="rexistro.html">Rexistrarse</a>

    <form action="validalogin.php" method="post">
        <input type="text" name="txtEmailLogin" placeholder="Email" required>
        <input type="password" name="txtContrasinalLogin" placeholder="Contrasinal" required>
        <button type="submit" name="btnLogin">Login</button>
    </form>

</body>
</html>