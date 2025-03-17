<?php session_start();?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=1, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<form action="pecharSesion.php" method="post">
        <button type="submit">Pechar sesión</button><br><br>
    </form>


<?php
$cookie = $_COOKIE["idioma_usuario"];

if (isset($cookie)) {
    if (strcmp($cookie, "galego") == 0) {
        echo "<p>O teu email é ". $_SESSION["datos"]["email"]."</p>";
    }elseif (strcmp($cookie, "castellano") == 0) {
        echo "<p>O Tu email es ". $_SESSION["datos"]["email"]."</p>";
    }else{
        echo "<p>Your email is ". $_SESSION["datos"]["email"]."</p>";
    }
}
?>
</body>
</html>