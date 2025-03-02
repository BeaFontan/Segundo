<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
            $conexion = mysqli_connect("dbXdebug", "root", "root", "folla1");

            if ($conexion) {
                mysqli_set_charset($conexion, 'utf8');

                $datos = mysqli_query($conexion, "SELECT id, dni, nome, apelidos, idade from xogador");

                $menores30 = mysqli_query($conexion, "SELECT * from xogador where idade < 30");

                $contaMenores22 = mysqli_query($conexion, "SELECT count(idade) from xogador where idade >22");

                $maioresGarcia = mysqli_query($conexion, "SELECT * from xogador where apelidos > 'G'");
            }
        ?>
        
    <table>
        <tr>
            <th>id</th>
            <th>dni</th>
            <th>nome</th>
            <th>apelidos</th>
            <th>idade</th>
        </tr>

        <?php
            if ($datos) {
                while ($fila=mysqli_fetch_array($datos)) {
                    echo "<tr>
                          <td>{$fila["id"]}</td>
                          <td>{$fila["dni"]}</td>
                          <td>{$fila["nome"]}</td>
                          <td>{$fila["apelidos"]}</td>
                          <td>{$fila["idade"]}</td>
                        </tr>";
                }
            }
        ?>
     
    </table>

    </br>

    <table>
        <tr>
            <th>id</th>
            <th>dni</th>
            <th>nome</th>
            <th>apelidos</th>
            <th>idade</th>
        </tr>

        <?php
            if ($menores30) {
                while ($fila=mysqli_fetch_array($menores30)) {
                    echo "<tr>
                          <td>{$fila["id"]}</td>
                          <td>{$fila["dni"]}</td>
                          <td>{$fila["nome"]}</td>
                          <td>{$fila["apelidos"]}</td>
                          <td>{$fila["idade"]}</td>
                        </tr>";
                }
            }
        ?>
    </table>


    <div>
        <?php
            if ($contaMenores22) {

                $total=mysqli_fetch_array($contaMenores22);

                while ($total) {
                    echo "<p> O total de alumnos maiores a 22 anos é: {$total[0]}</p>";
                    break;
                }
                
            }
        ?>
    </div>


    <table>
        <tr>
            <th>id</th>
            <th>dni</th>
            <th>nome</th>
            <th>apelidos</th>
            <th>idade</th>
        </tr>

        <?php
            if ($maioresGarcia) {
                while ($fila=mysqli_fetch_array($maioresGarcia)) {
                    echo "<tr>
                          <td>{$fila["id"]}</td>
                          <td>{$fila["dni"]}</td>
                          <td>{$fila["nome"]}</td>
                          <td>{$fila["apelidos"]}</td>
                          <td>{$fila["idade"]}</td>
                        </tr>";
                }
            }
        ?>
    </table>


</body>
</html>