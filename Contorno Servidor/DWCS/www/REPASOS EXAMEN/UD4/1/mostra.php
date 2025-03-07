<?php session_start(); ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <form action="pecharSesion.php" method="post">
        <button type="submit">Pechar Sesion</button>
    </form>

    <?php
    if (isset($_COOKIE["idioma_usuario"])) {
        if (strcmp($_COOKIE["idioma_usuario"], "castellano") == 0) {
            echo 'Tu email es ' . $_SESSION["datos"]["email"] . '!';
        } elseif (strcmp($_COOKIE["idioma_usuario"], "galego") == 0) {
            echo 'O teu email é ' . $_SESSION["datos"]["email"] . '!';
        } else {
            echo 'Your email is ' . $_SESSION["datos"]["email"] . '!';
        }
    }
    ?>
</body>

</html>