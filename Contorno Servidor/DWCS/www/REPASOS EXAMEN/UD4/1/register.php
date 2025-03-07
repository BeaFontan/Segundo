<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php
    if (isset($_GET["mensaxe"])) {
        echo "<p>" . $_GET["mensaxe"] . "</p>";
    }
    ?>
    <form action="login.php" method="post">
        <button type="submit">Login</button>
    </form>

    <form action="validaRegistro.php" method="post">
        <input type="email" name="txtEmail" placeholder="Email"><br>
        <input type="password" name="txtPass" placeholder="Contrasinal"><br>
        <button type="submit" name="btnRegister">Registro</button>
    </form>

</body>

</html>