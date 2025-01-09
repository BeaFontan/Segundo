<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="login.php" method="POST">
        <input type="text" name="textUsuario" placeholder = "Usuario"></br>
        <input type="text" name="textContrasinal" placeholder = "Contrasinal"></br>

        <button type="submit" name="botonLogin">Login</button>

    </form>

    <?php

        if (isset($_POST["botonLogin"])) {

            $usuarioLogin = $_POST["textUsuario"];
            $contrasianlLogin = $_POST["textContrasinal"];
           

            


        }
    ?>
</body>
</html>