<?php
if (!isset($_SERVER['PHP_AUTH_USER'])) {
    header('WWW-Authenticate: Basic realm="Acceso restrinxido"');
    header('HTTP/1.0 401 Unauthorized');
    echo 'Authorizacion requerida.';
    exit;
} else {
    $fich = file("usuarios.txt");
    $i = 0;
    $validado = false;

    for ($i=0; $i < count($fich); $i++) { 
        $campo = explode("?", $fich[$i]);
        if (($_SERVER['PHP_AUTH_USER'] == $campo[0]) && ($_SERVER['PHP_AUTH_PW'] == rtrim($campo[1]))) {
            $validado = true;
        }
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
            <?php echo $_SERVER['PHP_AUTH_USER'] . " " . $_SERVER['PHP_AUTH_PW'] ?>.
        </body>

        </html>
<?php
    }
} ?>