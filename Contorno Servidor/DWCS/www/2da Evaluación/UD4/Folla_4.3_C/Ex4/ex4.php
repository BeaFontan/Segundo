<?php
if (!isset($_SERVER['PHP_AUTH_USER'])) {
    header('WWW-Authenticate: Basic realm="Acceso restrinxido"');
    header('HTTP/1.0 401 Unauthorized');
    echo 'Authorizacion requerida.';
    exit;
} else {
    $fich = file("passwords.txt");
    $i = 0;
    $validado = false;

    while (!$validado && $i < count($fich)) {
        $campo = explode(",", $fich[$i]);
        if (($_SERVER['PHP_AUTH_USER'] == $campo[0]) && ($_SERVER['PHP_AUTH_PW'] == rtrim($campo[1]))) {
            $validado = true;
        }
        $i++;
    }
    if (!$validado) {
        header('WWW-Authenticate: Basic realm="Acceso restrinxido"');
        header('HTTP/1.0 401 Unauthorized');
        echo 'Authorizacion Requerida.';
        exit;
    } else { ?>
        <!DOCTYPE html>
        <html lang="es">

        <head>
            <meta charset="UTF-8" />
            <title>Autentiación http</title>
        </head>

        <body>
            Conseguiu o acceso á zona restrinxida</B> co usuario
            <?php echo $_SERVER['PHP_AUTH_USER'] ?>.
        </body>

        </html>
<?php
    }
} ?>