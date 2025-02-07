<?php
 if ((!isset($_SERVER['PHP_AUTH_USER'])) || 
($_SERVER['PHP_AUTH_USER'] != "proba") || ($_SERVER['PHP_AUTH_PW'] != "abc123"))
 {
    header('WWW-Authenticate: Basic realm="Acceso restrinxido"'); 
    header('HTTP/1.0 401 Unauthorized');
    echo 'Requerida autenticación para acceder a esta páxina.';
    exit;
 }
 ?>
 <html>
      <head>
           <title>Exemplo de autenticación http</title>
      </head>
      <body>
           Conseguiu o acceso a zona restrinxida</B>.
      </body>
 </html>