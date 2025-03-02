<?php

if (isset($_POST["btnEnviar"])) {
   setcookie('user["nome"]', $_POST["txtNome"]);
   setcookie('user["apelido"]', $_POST["txtApelido"]);
   setcookie('user["email"]', $_POST["txtEmail"]);
   header("location:cookieArray.php");
   exit();
}

if (isset($_POST["btnEliminar"])) {
    setcookie('user["email"]', $_POST["txtEmail"], 1);
    header("location:cookieArray.php");
    exit();
}

if ($_COOKIE["user"]) {
    foreach ($_COOKIE["user"] as $key => $value) {
        echo "$key - $value";
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
        <button type="Submit" name="btnEliminar">Eliminar Elemento Array</button>
    </form>
</body>
</html>