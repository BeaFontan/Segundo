<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="estilo.css">
</head>
<body>
    <div class="container-login">
        <div class="login">
            <h2>Login</h2>
            <form action="validalogin.php" method="post">
                <label for="idioma">Selecciona o teu idioma:</label>

                <select name="selectIdioma">
                    <option value="castellano">Castellano</option>
                    <option value="galego">Galego</option>
                    <option value="ingles">English</option>
                </select>

                <input type="text" name="txtEmailLogin" placeholder="Email" required>
                <input type="password" name="txtContrasinalLogin" placeholder="Contrasinal" required>
                <button type="submit" name="btnLogin">Login</button>
            </form>
            
            <a class="link" href="rexistro.php">Rexistrarse</a>
            <?php
                if (isset($_GET["mensaxe"])) {
                    echo "<p>".$_GET["mensaxe"]."</p>";
                }
            ?>
        </div>
    </div>
</body>
</html>