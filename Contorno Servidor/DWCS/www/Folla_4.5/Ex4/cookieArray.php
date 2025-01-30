<?php

if (isset($_POST["btnEnviar"])) {
   setcookie('user["nome"]', $_POST["txtNome"]);
   setcookie('user["apelido"]', $_POST["txtApelido"]);
   setcookie('user["email"]', $_POST["txtEmail"]);
   header("location:cookieArray.php");
}


if ($_COOKIE["user"]) {
    foreach ($_COOKIE["user"] as $key => $value) {
        echo "$key - $value";
    }
}
?>