<?php
if (isset($_GET["mensaxe"])) {
    echo "<p>".$_GET["mensaxe"]."</p>";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rexistro</title>
</head>
<body>
    <form action="validarexistro.php" method="post">
        <input type="text" name="txtNomeRexistro" placeholder="Nome" required>
        <input type="text" name="txtApelido1Rexistro" placeholder="Primeiro apelido" required>
        <input type="text" name="txtApelido2Rexistro" placeholder="Segundo apelido">
        <input type="text" name="txtEmailRexistro" placeholder="email" required>
        <input type="password" name="txtContrasinalRexistro" placeholder="Contrasinal" required>
        <button type="submit" name="btnEnviarRexistro">Rexistrarse</button>
    </form>
</body>
</html>