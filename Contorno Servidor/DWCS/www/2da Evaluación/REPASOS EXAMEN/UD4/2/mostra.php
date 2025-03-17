<?php session_start(); ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <form action="pechaSesion.php">
        <button type="submit">Pechar sesion</button>
    </form>

    <?php
    if (isset($_COOKIE["idioma_usuario"])) {
        if (strcmp($_COOKIE["idioma_usuario"], "castellano") == 0) {
            echo "<p>Tu email es " . $_SESSION["datos"]["email"] . "</p>";
        } elseif (strcmp($_COOKIE["idioma_usuario"], "galego") == 0) {
            echo "<p>O teu email é " . $_SESSION["datos"]["email"] . "</p>";
        } else {
            echo "<p>Your email is " . $_SESSION["datos"]["email"] . "</p>";
        }
    }
    ?>
</body>

</html>