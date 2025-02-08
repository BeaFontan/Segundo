<?php
session_start();

include_once("xestionaRoles.php");

if (!isset($_SESSION["datos"])) {
    header("location:login.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Productos</title>
    <link rel="stylesheet" href="estilo.css">
</head>

<body>

    <form action="pechasesion.php" method="post">
        <div class="elementos-menu">
            <button type="submit" name="btnPecharSesion">Pechar sesión</button>
        </div>

    </form>

    <h2>
        <?php
            if (!empty($mensaxe)) {
                echo "$mensaxe";
            }

            if (isset($_SESSION["mensajeRolActualizado"])) {
                echo $_SESSION["mensajeRolActualizado"];
                unset($_SESSION["mensajeRolActualizado"]);
            }
        ?>
    </h2>

    <div>
        <table>
            <tr>
                <th>Email</th>
                <th>Nome</th>
                <th>Apelido1</th>
                <th>Apelido2</th>
                <th>Ultima conexion</th>
                <th>Rol</th>
                <th>Cambiar Rol</th>
            </tr>

            <?php
            $arrayUsuarios = recuperarUsuarios($pdo);

            if (!empty($arrayUsuarios)) {
                foreach ($arrayUsuarios as $usuario) {

                    $selectRol = '<form action="panelAdmin.php" method="post">
                                        <select name="selectRol">
                                            <option value="usuario">Usuario</option>
                                            <option value="moderador">Moderador</option>
                                        </select>
                                        <input type="hidden" name="hiddenIdUsuario" value="' . $usuario["id"] . '">
                                        <button type="submit" name="btnActualizarRol">Actualizar</button>
                                </form>';

                    echo '<tr>
                            <td>' . $usuario["email"] . '</td>
                            <td>' . $usuario["nome"] . '</td>
                            <td>' . $usuario["apelido1"] . '</td>
                            <td>' . $usuario["apelido2"] . '</td>
                            <td>' . $usuario["ultima_conexion"] . '</td>
                            <td>' . $usuario["rol"] . '</td>
                            <td>' . $selectRol . '</td>
                        </tr>';
                }
            }
            ?>
        </table>
    </div>
</body>
</html>