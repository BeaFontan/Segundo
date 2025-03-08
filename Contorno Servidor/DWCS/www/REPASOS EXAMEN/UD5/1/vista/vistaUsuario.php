<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php

    function mostrarMensaxe($mensaxe): void
    {
        if (isset($mensaxe)) {
            echo $mensaxe;
        }
    }

    function formUsuario()
    {
        echo '       
            <h1>Login</h1>
            <form action="UsuarioControlador.php" method="post">
                <input type="text" name="txtUsuario" placeholder="Usuario"><br>
                <input type="password" name="txtPass" placeholder="Contrasinal"><br><br>
                <button type="submit" name="btnLogin">Login</button>
            </form>';
    }
    ?>

</body>
</html>