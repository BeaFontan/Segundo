
<!-- revisar el mierdo de pones estilo. -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
      th,td {
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

  <h1>Pocentaxe de escolarización</h1>
  
  <table border="1px" style="background-color: black; color: azure; font-size: 40px">
    <tr>
      <th>Comunidade</th>
      <th>Escolarización por 1000 habitantes</th>
      <th>Porcentaxe</th>
    </tr>
        <?php

    $comunidades = [
      "Andalucía" => 593.6,
      "Aragón" => 600.3,
      "Asturias" => 582.9,e
      "Baleares" => 489.7,
      "Canarias" => 573.2,
      "Cantabria" => 551.5,
      "Castilla e León" => 645.3,
      "Catilla la Mancha" => 555.8,
      "Cataluña" => 568.3,
      "Comunidade Valenciana" => 561.1,
      "Extremadura" => 584.3,
      "Galicia" => 600.1
    ];

    $media = array_sum($comunidades) / count($comunidades);

        foreach ($comunidades as $comunidade => $escolarizacion) {
          $porcentaxe = $escolarizacion*100/1000;

          echo "<tr>";
          echo "<td>$comunidade</td>";
          echo "<td>$escolarizacion</td>";
          echo "<td>$porcentaxe</td>";
          echo "</tr>";
        }
          
        $n = 1;
        
        for ($i = 0; $i <= $escolarizacion.count(); $i++) {
            
          if ($i % 2 == 0) {
               echo "<tr class='pares'>";
            } else {
                echo "<tr>";
            }


        }

      ?>

    </table>
</body>

</html>