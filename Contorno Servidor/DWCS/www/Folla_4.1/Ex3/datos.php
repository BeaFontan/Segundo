<?php
    session_start();

    if (!isset($_SESSION["datos"])) {
        header("location:login.php");
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
    
    <form action="pechar.php" method="POST">
        <button type="submit">Pechar sesion</button></br></br>
    </form>


    <form action="datos.php" method="POST">
        <button type="submit" name="boton" value="ordenarEmpresa">Ordenar por Nome Empresa</button>
        <button type="submit" name="boton" value="ordenarEmpregado">Ordenador por Empregado asignado</button></br></br>
    </form>


    <form action="engadeRexistro.php" method="post">
        <?php
            if (strcmp($_SESSION["datos"]["nome"], "Ana") == 0) {
                echo '<button type="submit" name="boton" value="agregar">Engadir Rexistro</button>';
            }
        ?>
    </form>

    <!-- Saludar al usuario conectado -->
    <p>Holi <?php echo $_SESSION["datos"]["nome"] ?></p>

    <table>
        <tr>
            <th>Número</th>
            <th>Nome</th>
            <th>Empregado asignado</th>
            <th>limite crédito</th>
        </tr>
        <tr>
            <?php
                //Inclusión de la conexión a la base
                include("conexion.php");

                //Mostrar todos
                try {
                    $query = $pdo->query("Select * from cliente");

                    $query->execute();

                    $arrayClientes = $query->fetchAll();

                } catch (PDOException $e) {
                    echo "Erro no listado de clientes " . $e->getMessage();
                }


                //Botones de ordenar
                if (isset($_POST["boton"])) {
                    switch ($_POST["boton"]) {
                        case 'ordenarEmpresa':
                            
                            try {
                                $query = $pdo->query("Select * from cliente order by nome");
            
                                $query->execute();
            
                                $arrayClientes = $query->fetchAll();
            
                            } catch (PDOException $e) {
                                echo "Erro ordenado por nome" . $e->getMessage();
                            }

                            break;

                        case 'ordenarEmpregado':
                        
                            try {
                                $query = $pdo->query("Select * from cliente order by num_empregado_asignado");
            
                                $query->execute();
            
                                $arrayClientes = $query->fetchAll();
            
                            } catch (PDOException $e) {
                                echo "Erro ordenado por empregado" . $e->getMessage();
                            }
                        
                            break;

                    }
                }

                //Mostrar mensaje de insercción en engadeRexistro.php si existe
                if (isset($_GET["mensaxe"])) {
                    echo "<p>".$_GET["mensaxe"]."</p>";
                }

                //Mostrar datos
                if ($arrayClientes) {
                    foreach ($arrayClientes as $cliente) {
                        echo "<tr>
                            <td>$cliente[0]</td>
                            <td>$cliente[1]</td>
                            <td>$cliente[2]</td>
                            <td>$cliente[3]</td>
                        </tr>";
                    }
                }
            ?>
        </tr>
    </table>
</body>
</html>