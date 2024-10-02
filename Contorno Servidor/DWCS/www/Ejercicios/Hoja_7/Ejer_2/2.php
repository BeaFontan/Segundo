<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        body {
            color: black;
            font-family: sans-serif;
            font-size: 20px;
        }
    </style>
</head>

<body>

    <?php

    $cadea = $_GET['cadea'];
    $funcionsCadea = $_GET['funcionsCadea'];

    switch ($funcionsCadea) {
        case 'stripcslashes':
            echo "stripslashes elimina as barras invertidas da cadea. <br><br>";
            echo "Cadea sen tratar: " . htmlspecialchars($cadea) . "<br><br>";
            echo "Cadea tratada: " . htmlspecialchars(stripslashes($cadea));
            break;
    
        case 'urlencode':
            echo "urlencode codifica unha cadea de texto para que poida ser enviada por unha URL. <br><br>";
            echo "Cadea sen tratar: " . htmlspecialchars($cadea) . "<br><br>";
            echo "Cadea tratada: " . htmlspecialchars(urlencode($cadea));
            break;
    
        case 'urldecode': 
            echo "urldecode decodifica unha cadea de texto codificada por urlencode. <br><br>";
            echo "Cadea sen tratar: " . htmlspecialchars($cadea) . "<br><br>";
            echo "Cadea tratada: " . htmlspecialchars(urldecode($cadea));
            break;
    
        case 'nl2br':
            echo "nl2br converte os saltos de liña en etiquetas <br> HTML. <br><br>";
            echo "Cadea sen tratar: " . htmlspecialchars($cadea) . "<br><br>";
            echo "Cadea tratada: " . nl2br(htmlspecialchars($cadea));
            break;
    
        default:
            echo "Por favor, introduce unha cadea de texto e escolle unha opción.";
            break;
    }
    ?>

</body>

</html>