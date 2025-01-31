<?php

include("conexion.php");

if (isset($_POST["btnInsertar"])) {
    try {
        $query = $pdo->prepare("INSERT INTO `comentarios`(`name`, `comentario`) VALUES (?,?)");
        $query->execute([htmlspecialchars($_POST["txtNome"]), htmlspecialchars($_POST["txtComentario"])]);
    } catch (PDOException $e) {
        echo "Erro na conexión " . $e->getMessage();
    }
}

try {
    $query = $pdo->query("select * from comentarios");
    $query->execute();
    $arrayComentarios = $query->fetchAll();

} catch (PDOException $e) {
    echo "Erro na conexión " . $e->getMessage();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <table>
        <tr>
            <th>Nome</th>
            <th>Comentario</th>
        </tr>
        <tr>
            <?php
                foreach ($arrayComentarios as $datos) {
                    echo "<tr>
                            <td>".$datos["name"]."</td>
                            <td>".$datos["comentario"]."</td>
                         </tr>";
                }

            ?>
        </tr>

    </table>
</body>
</html>


