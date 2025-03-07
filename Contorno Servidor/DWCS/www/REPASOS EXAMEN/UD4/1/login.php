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

    <form action="register.php" method="post">
        <button type="submit">Rexistro</button>
    </form>

    <form action="validaLogin.php" method="post">
        <select name="selectIdioma">
            <option value="castellano">Castellano</option>
            <option value="galego">Galego</option>
            <option value="ingles">English</option>
        </select>

        <input type="text" name="txtEmail" placeholder="Email">
        <input type="password" name="txtPass" placeholder="Contrasinal">
        <button type="submit" name="btnLogin">Login</button>
    </form>
</body>

</html>