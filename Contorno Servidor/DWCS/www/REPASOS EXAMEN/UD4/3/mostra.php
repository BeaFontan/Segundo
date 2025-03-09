<?php session_start(); ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <form action="pechaSesion.php" method="post">
        <button type="submit">Pechar sesión</button>
    </form>

    <?php
    if (isset($_COOKIE["idioma_usuario"])) {
        if (strcmp($_COOKIE["idioma_usuario"], "castellano") == 0) {
            echo "<p>Tu email es </p>" . $_SESSION["datos"]["email"];
        } elseif (strcmp($_COOKIE["idioma_usuario"], "galego") == 0) {
            echo "<p>O teu email é </p>" . $_SESSION["datos"]["email"];
        } else {
            echo "<p>Your email is </p>" . $_SESSION["datos"]["email"];
        }
    }

    ?>
</body>

</html>