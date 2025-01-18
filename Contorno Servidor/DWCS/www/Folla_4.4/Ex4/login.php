<?php
session_start();

if (isset($_GET["mensaxe"])) {
    echo "<p>".$_GET["mensaxe"]."</p>";
}

if (isset($_POST["btnRegistro"])) {
    header("location:rexistro.html");
    exit;
}

if (isset($_POST["btnLogin"])) {
 
    $usuario = $_POST["txtNome"];
    $contrasinal = $_POST["txtPass"];

    $datos = ["usuario" => $usuario, "contrasinal" => $contrasinal];

    $_SESSION["datos"] = $datos;

    header("location:comprobacredenciais.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario de Registro</title>
</head>
<body>
    <form action="login.php" method="post">

        <h1>Introduce os teus datos para logearte</h1>

        <input type="text" id="txtNome" name="txtNome" placeholder="Nome"><br><br>
        <input type="text" id="txtPass" name="txtPass" placeholder="Contrasinal"><br><br>

        <button type="submit" name="btnLogin">Login</button>  <button type="submit" name="btnRegistro">Registrarse</button>
    </form>
</body>
</html>
