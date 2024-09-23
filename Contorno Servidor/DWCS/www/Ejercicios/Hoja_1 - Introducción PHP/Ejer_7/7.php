<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="estilo.css">
    <title>Document</title>
</head>

<body>
    <table border=1px>
        <tr>
            <th>Nome e apelidos</th>
            <th>Mail</th>
            <th>Experiencia</th>
            <th>Idade</th>
            <th>Atopar</th>
            <th>Comentario</th>
        </tr>
        <?php
        echo "<tr>";
        echo "<td>" . $_GET['nome'] . "</td>";
        echo "<td>" . $_GET['mail'] . "</td>";

        //Experencia
        echo "<td>";
        if (isset($_GET["museo"])) {
            echo $_GET['museo'];
        }
        echo "<br>";
        if (isset($_GET["comico"])) {
            echo $_GET['comico'];
        }
        echo "<br>";
        if (isset($_POST["actor"])) {
            echo $_POST['actor'];
        }
        echo "</td>";

        //idade
        echo "<td>" . $_GET['idade'] . "</td>";

        //Atopar
        echo "<td>" . $_GET['atopar'] . "</td>";

        //Comentarios
        echo "<td>" . $_GET['textarea'] . "</td>";
        echo "</tr>";
        ?>
    </table>

</body>

</html>