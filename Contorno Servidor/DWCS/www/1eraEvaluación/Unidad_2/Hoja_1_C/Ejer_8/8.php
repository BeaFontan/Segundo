<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
        echo "<td>" . $_POST['nome'] . "</td>";
        echo "<td>" . $_POST['mail'] . "</td>";

        //Experencia
        echo "<td>";
        if (isset($_POST["museo"])) {
            echo $_POST['museo'];
        }
        echo "<br>";
        if (isset($_POST["comico"])) {
            echo $_POST['comico'];
        }
        echo "<br>";
        if (isset($_POST["actor"])) {
            echo $_POST['actor'];
        }
        echo "</td>";

        //idade
        echo "<td>" . $_POST['idade'] . "</td>";

        //Atopar
        echo "<td>" . $_POST['atopar'] . "</td>";

        //Comentarios
        echo "<td>" . $_POST['textarea'] . "</td>";
        echo "</tr>";
        ?>
    </table>

</body>

</html>