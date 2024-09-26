<?php

  $trabajadores = array(
      "Vanessa" => 5000,
      "Andrés" => 4500,
      "Elena" => 4800,
      "Carol" => 5200
  );

  $media = array_sum($trabajadores) / count($trabajadores);

  $max = max($trabadores);

  $min = min($trabajadores)

?>

<!DOCTYPE html>
<html>

  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>
  </head>

  <body>
    <table border="1px" style="background-color: black; color: azure; font-size: 40px">
      <tr>
        <th>Alumno</th>
        <th>Soldo</th>
      </tr>

      <?php
      foreach ($trabajadores as $nombre => $sueldo) {
        echo "<tr>";
        echo "<td>$nombre</td>";
        echo "<td>$sueldo</td>";
        echo "</tr>";
      }
      ?>

      <tr>
        <td style="background-color: gray">Media</td>
        <td><?php echo $media; ?></td>
        <td><?php echo $max; ?></td>
        <td><?php echo $min; ?></td>
      </tr>
    </table>
  </body>

</html>