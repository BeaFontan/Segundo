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
    $cookie = $_COOKIE["idioma_user"];

    if (isset($cookie)) {
        if (strcmp($cookie, "galego") == 0) {
            echo "<p>O teu email é ".$_SESSION["datos"]["email"]."</p>";
        } else {
            echo "<p>Your email is ".$_SESSION["datos"]["email"]."</p>";
        }
    }
    ?>
</body>
</html>