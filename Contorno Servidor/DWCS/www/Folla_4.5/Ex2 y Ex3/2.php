<?php

if (isset($_POST["btnEnviar"])) {
    setcookie('Lingua','Galego', time()+1000);

    setcookie('user[nome]', $_POST["nome"], time()+10);
    setcookie('user[email]',$_POST["email"]);

    setcookie('Hola', 'Hola',time()+10);
    setcookie('Hola', 'Hola',time()-10);

    header("location:2.php");
}

if (isset($_POST["borrarCookies"])) {
    setcookie('Lingua','Galego', time() - 1800);
    header("location:2.php");
}


if( !empty($_COOKIE['user']) ) {
    foreach ($_COOKIE['user'] as $key=>$value)
    echo "$key : $value <br>";
}

echo 'A lingua elexida foi ', $_COOKIE['Lingua'];

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="2.php" method="post">
        <input type="text" name="nome" placeholder="Nome">
        <input type="text" name="email" placeholder="Email">
        <button type="submit" name="btnEnviar">Enviar</button>

        <button type="submit" name="borrarCookies">Borrar cookies</button>
    </form>

</body>
</html>
