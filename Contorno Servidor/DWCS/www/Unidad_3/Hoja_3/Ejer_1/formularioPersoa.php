<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Novo par</title>
    <style type="text/css">
        label
        {
          display:inline-block;
            width: 4em;
            
        }
        input[type=text]
        {
            width:30em;
        }

    </style>
</head>
<h2>Exemplo Inxección SQL</h2>
<p> Preparamos entrada con Eva' OR 1='1</p>
<body>
    <form action='enviaBD.php' action="GET">
        <label for="nome">Nome</label><input id="nome" type="text" name="nome"><br>
        <input type='submit' name="novo" value="Enviar">
    </form>

<?php  

?>
</body>
</html>

