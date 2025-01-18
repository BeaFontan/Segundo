<?php
session_start();

if (!isset($_SESSION["datos"])) {
    header("location:login.php");
    exit;
}

include("conexion.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="pecharsesion.php" method="post">
        <button type="submit">Pechar sesión</button>
    </form>

    <?php
    if (strcmp($_SESSION["datos"]["rol"], "usuario") == 0) {

        echo "Hola " . $_SESSION["datos"]["usuario"].", última conexión: " . $_SESSION["datos"]["ultimaconexion"];

        $ultimaConexion = date("Y-m-d H:i:s");

        try {
            $query = $pdo->prepare("UPDATE `usuariosTempo` SET `ultimaconexion`=? WHERE nome like ?");
            $query->execute([$ultimaConexion, $_SESSION["datos"]["usuario"]]);

        } catch (PDOException $e) {
            echo "Erro actualizando última conexion" . $e->getMessage();
        }
    }

    if (strcmp($_SESSION["datos"]["rol"], "admin") == 0) {
        try {
            $query = $pdo->query("Select * from usuariosTempo");
            $query->execute();
            $usuarios = $query->fetchAll();
        } catch (PDOException $e) {
            echo "Erro recuperando todos os usuarios" . $e->getMessage();
        }

        echo "<table>
            <tr>
                <th>Nome</th>
                <th>Última conexión</th>
                <th>Rol</th>
            </tr>";
        
            if ($usuarios) {
                foreach ($usuarios as $usuario) {
                    echo "<tr>
                        <td>$usuario[0]</td>
                        <td>$usuario[2]</td>
                        <td>$usuario[3]</td>
                    </tr>";
                }
            }

        echo "</table>";
    }
    ?>

</body>
</html>