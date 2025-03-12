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
            echo "<p>".$_GET["mensaxe"]."</p>";
        }

    ?>
    <form action="rexistro.php" method="post">
        <button type="submit">Rexistro</button>
    </form>

    <form action="validaLogin.php" method="post">
        <h1>Login</h1>
        <select name="SelectIdioma">
            <option value="galego">Galego</option>
            <option value="castellano">Castellano</option>
            <option value="english">English</option>
        </select><br><br>
        <input type="email" name="txtEmail" placeholder="Email"><br>
        <input type="password" name="txtPass" placeholder="Constrasinal"><br><br>
        <button type="submit" name="btnLogin">Login</button>
    </form>
</body>
</html>