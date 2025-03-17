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
        echo "<p>{$_GET["mensaxe"]}</p>";
    }
    ?>

    <form action="validaLogin.php" method="post">
        <select name="SelectIdioma">
            <option value="galego">Galego</option>
            <option value="castellano">Castellano</option>
            <option value="english">English</option>
        </select><br><br>

        <input type="email" name="txtEmail" placeholder="Email"><br>
        <input type="password" name="txtPass" placeholder="Contrasinal"><br>
        <button type="submit" name="btnLogin">Login</button>
    </form><br><br>

    
    <form action="rexistro.php" method="post">
        <button type="submit">Rexistro</button>
    </form>
</body>

</html>