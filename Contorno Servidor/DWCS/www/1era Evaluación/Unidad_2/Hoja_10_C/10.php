<!DOCTYPE html>
<html lang="gl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        body {
            background-color: #d1dbeb;
        }
        label {
            font-size: 30px;
            color: #435570;
            font-weight: bold;
        }
        input[type="submit"] {
            width: 250px;
        }
        input[id="frase"] {
            width: 100%;
        }
        img {
            width: 100%;
        }
        p{
            font-weight: bold;
            font-size: 20px;
        }
    </style>
</head>
<body>

<img src="cabeceiraFolla2.10.jpg" alt="Cabeceira">

<form action="10.php" method="POST">

    <label for="frase">Introduce Frase:</label><br>
    <input type="text" id="frase" name="frase" value="<?php if (isset($_POST['frase'])) echo $_POST['frase']; ?>" required>
    <br><br> <!-- recojo el valor y lo mantengo para que se mantenga la frase todo el tiempo y uso htmlspecialcharacters para que coja solo texto y evitar inyecciones -->
    
    <input type="submit" name="accion" value="Pasa a maiúscula a primeira letra"><br>
    <input type="submit" name="accion" value="Pasa a minúscula a primeira letra"><br>
    <input type="submit" name="accion" value="Elimina os espazos"><br>
    <input type="submit" name="accion" value="Elimina as letras e"><br>
    <input type="submit" name="accion" value="Cambia os puntos por comas"><br>
    <br><br>

    <label for="palabra">Introduce Palabra:</label><br>
    <input type="text" name="palabra" value="<?php echo isset($_POST['palabra']) ? htmlspecialchars($_POST['palabra']) : ''; ?>">
    <br><br>   <!-- recojo el valor y lo mantengo para que se mantenga la frase todo el tiempo y uso htmlspecialcharacters para que coja solo texto y evitar inyecciones -->

    <input type="submit" name="accion" value="A palabra está na frase?"><br>
    <input type="submit" name="accion" value="Elimina a palabra"><br>
    <input type="submit" name="accion" value="Cambia tardes por noites">
    <br><br>

    <label>Resultado:</label><br>
</form>

<div>
    <?php
    if (isset($_POST['frase']) && isset($_POST['accion'])) {
        $frase = $_POST['frase'];
        $boton = $_POST['accion'];
        $palabra = $_POST['palabra'];

        switch ($boton) {
            case 'Pasa a maiúscula a primeira letra':
                $frase = ucfirst($frase);
                break;

            case 'Pasa a minúscula a primeira letra':
                $frase = lcfirst($frase);
                break;

            case 'Elimina os espazos':
                $frase = str_replace(' ', '', $frase);
                break;

            case 'Elimina as letras e':
                $frase = str_replace('e', '', $frase);
                break;

            case 'Cambia os puntos por comas':
                $frase = str_replace('.', ',', $frase);
                break;

            case 'A palabra está na frase?':
                if ($palabra) {
                    if (strpos($frase, $palabra) !== false) {
                        echo "A palabra '$palabra' está na frase.";
                    } else {
                        echo "A palabra '$palabra' non está na frase.";
                    }
                } else {
                    echo "Por favor, introduce unha palabra.";
                }
                break;

            case 'Elimina a palabra':
                if ($palabra) {
                    $frase = str_replace($palabra, '', $frase);
                } else {
                    echo "Por favor, introduce unha palabra.";
                }
                break;

            case 'Cambia tardes por noites':
                $frase = str_replace('tardes', 'noites', $frase);
                break;
        }

        //mostrar resultados que no sean el del buscar el botón, que ya cambio la variable en el propio switch
        if ($boton !== 'A palabra está na frase?') {
            echo "<p>{$frase}</p>";
        }
    }
    ?>
</div>

</body>
</html>
