<?php
$parrafo = "Hello, how are you";

if (isset($_POST["btnEspanhol"])) {
    setcookie("lingua", "espanhol", time()+10);
    header("Location:ex6.php");
    exit();
    
}

if (isset($_POST["btnGalego"])) {
    setcookie("lingua", "galego");
    header("Location:ex6.php");
    exit();
    
}

if (isset($_COOKIE["lingua"])){

    if ($_COOKIE["lingua"] == "espanhol") {
        $parrafo = "Hola que tal";
    }

    if ($_COOKIE["lingua"] == "galego") {
        $parrafo = "Boas que tal";
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form method="post">
        <button type="submit" name="btnEspanhol">Español</button>
        <button type="submit" name="btnGalego">Galego</button>
    </form>

    <?php echo $parrafo?>
</body>
</html>