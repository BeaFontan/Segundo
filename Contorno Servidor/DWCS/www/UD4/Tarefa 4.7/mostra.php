<?php
session_start();

if (strcmp($_SESSION["datos"]["rol"], "administrador") == 0) {
    # code...

}elseif (strcmp($_SESSION["datos"]["rol"], "moderador") == 0)  {
    # code...
}else{

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
    
<form action="pechasesion.php" method="post">
    <button type="submit" name="btnPecharSesion">Pechar sesión</button>
</form>

</body>
</html>