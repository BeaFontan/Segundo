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
    if (strcmp($_SESSION["datos"]["rol"], "user") == 0) {

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

        if (isset($_POST["botonEliminar"])) {

            $usuarioEliminar = $_POST["botonEliminar"];

            try {
                $query = $pdo->prepare("DELETE FROM `usuariosTempo` WHERE nome like ?");
                $query->execute([$usuarioEliminar]);
            } catch (PDOException $e) {
                echo "Erro eliminando usuario" . $e->getMessage();
            }
        }

        if (isset($_POST["botonRol"])) {
            $datosActualizacion = $_POST["botonRol"];

            $arrayDatos= explode(',', $datosActualizacion);
            $usuarioNuevoRol = $arrayDatos[1];

            if (strcmp($arrayDatos[0], "usuario") == 0) {
                $nuevoRol = "admin";
    
                try {
                    $query = $pdo->prepare("UPDATE `usuariosTempo` SET `rol`= ? WHERE nome like ?");
                    $query->execute([$nuevoRol, $usuarioNuevoRol]);
        
                } catch (PDOException $e) {
                    echo "Erro actualizando actualizando el rol a admin" . $e->getMessage();
                }
            }else{
                $nuevoRol = "usuario";

                try {
                    $query = $pdo->prepare("UPDATE `usuariosTempo` SET `rol`= ? WHERE nome like ?");
                    $query->execute([$nuevoRol, $usuarioNuevoRol]);
        
                } catch (PDOException $e) {
                    echo "Erro actualizando actualizando el rol a usuario" . $e->getMessage();
                }
            }
        }

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
                    $formularioEliminar='
                        <form action="mostra.php" method="post">
                            <button type="submit" name="botonEliminar" value="'.$usuario[0].'">Eliminar</button>
                        </form>';

                    
                    $nomeERoldeUsuario = "$usuario[3],$usuario[0]";
                    $formularioRol='
                       <form action="mostra.php" method="post">
                            <button type="submit" name="botonRol" value="'.$nomeERoldeUsuario.'">Cambiar rol</button>
                        </form>';

                    echo "<tr>
                        <td>$usuario[0]</td>
                        <td>$usuario[2]</td>
                        <td>$usuario[3]</td>
                        <td>$formularioRol</td>
                        <td>$formularioEliminar</td>
                    </tr>";
                }
            }

        echo "</table>";
    }
    ?>
</body>
</html>