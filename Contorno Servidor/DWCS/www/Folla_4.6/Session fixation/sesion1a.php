<?php
session_start();

if (!isset($_SESSION["marcadecontrol"])) {
    session_regenerate_id(true);
    
    //borrarmos o ficheiro da ID da sesión anterior
    $_SESSION["marcadecontrol"]= false;
    
}

echo session_id();

if (isset($_POST["btnPechar"])) {
   session_destroy(); 
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
    <form action="" method="post">
        <button type="submit" name="btnPechar"> Pechar sesión</button>
    </form>
</body>
</html>

