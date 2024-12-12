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
            <th>Número</th>
            <th>Multiplicando</th>
            <th>Resultado</th>
        </tr>

        <?php
            $n=7;
            for ($i=1; $i <= 10; $i++) { 

                $resultado = $n*$i;
 
                    echo "<tr>";
                        echo "<td>".$i."</td>";
                        echo "<td>"."x".$n."</td>";
                        echo "<td>".$resultado."</td>";
                    echo "</tr>";  
            }
        ?>
    </table>
</body>
</html>