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
        case 'chop':
            echo " eliminar espacios en blanco o cualquier otro carácter especificado del final de una cadena <br><br>";
            echo "Cadea sen tratar: " . $cadea . "<br><br>";
            echo "Cadea tratada: " . chop($cadea, 'l');
            break;
    
        case 'ltrim':
            echo " <br>devuelve un string con los espacios en blanco retirados del inicio de str<br>";
            echo "Cadea sen tratar: " . $cadea . "<br><br>";
            echo "Cadea tratada: " . ltrim($cadea, "H");
            break;
    
        case 'trim': 
            echo "<br>Quita los espacios y otros caracteres del principio y final<br>";
            echo "Cadea sen tratar: " . $cadea . "<br><br>";
            echo "Cadea tratada: " . trim($cadea, "H/l");
            break;
    
        case 'string_tags':
            echo "<br>Quita las tag de php o html de una cadena<br>";
            echo "Cadea sen tratar: " . $cadea . "<br><br>";
            echo "Cadea tratada: " . strip_tags($cadea);
            break;

        case 'strtoupper':
            echo "<br>Make a string uppercase<br>";
            echo "Cadea sen tratar: " . $cadea . "<br><br>";
            echo "Cadea tratada: " . strtoupper($cadea);
            break;           

        case 'strtolower':
            echo "<br>Make a string lowercase<br><br>";
            echo "Cadea sen tratar: " . $cadea . "<br><br>";
            echo "Cadea tratada: " . strtolower($cadea);
            break;
            
        case 'ucwords':
            echo "<br>Uppercase the first character of each word in a string<br>";
            echo "Cadea sen tratar: " . $cadea . "<br><br>";
            echo "Cadea tratada: " . ucwords($cadea);
            break;       
    }
    ?>
</body>

</html>