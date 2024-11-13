<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        table {
            border-collapse: collapse;
        }

        th,
        td {
            border: 1px solid black;
            padding: 8px;
            text-align: center;
        }

        th {
            background-color: gray;
        }

        .pares {
            background-color: black;
            color: yellow;
        }
    </style>
</head>

<body>
    <table border="1px">
        <tr>
            <th>Día</th>
            <th>Saúdo</th>
        </tr>

        <?php
        $n = 1;
        $buenosDias = "Bós días";
        $buenasTardes = "Boas tardes";
        
        for ($i = 0; $i <= 99; $i++) {
            
            if ($i % 2 == 0) {
                echo "<tr class='pares'>";
            } else {
                echo "<tr>";
            }

            echo "<td>" . $numero . "</td>";
            $numero += 1;

            if ($i % 2 != 0) {
                echo "<td>" . $saudoTarde . "</td>";
            } else {
                echo "<td>" . $buenosDias . "</td>";
            }
            echo "</tr>";
        }

        ?>
</body>

</html>