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
            <th>Orden</th>
            <th>Impar</th>
        </tr>

        <?php
            $n=1;
            for ($i=0; $i <= 50; $i++) { 

                if ($i %2!=0) {
                    echo "<tr>";
                        echo "<td>".$n."</td>";
                        echo "<td>".$i."</td>";
                    echo "</tr>";
                    $n+=1;
                }
            }
        ?>
    </table>
</body>
</html>