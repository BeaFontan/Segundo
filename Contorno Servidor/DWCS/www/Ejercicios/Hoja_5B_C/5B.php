<?php
$pilotos = [
    "Lewis Hamilton" => [
        ["Premio" => "Australia", "Posicion" => 2],
        ["Premio" => "Baréin", "Posicion" => 3],
        ["Premio" => "China", "Posicion" => 4],
        ["Premio" => "Azerbaiyán", "Posicion" => 1],
        ["Premio" => "España", "Posicion" => 1],
        ["Premio" => "Mónaco", "Posicion" => 3],
        ["Premio" => "Canadá", "Posicion" => 5],
    ],
    "Sebastian Vettel" => [
        ["Premio" => "Australia", "Posicion" => 1],
        ["Premio" => "Baréin", "Posicion" => 1],
        ["Premio" => "China", "Posicion" => 8],
        ["Premio" => "Azerbaiyán", "Posicion" => 4],
        ["Premio" => "España", "Posicion" => 4],
        ["Premio" => "Mónaco", "Posicion" => 2],
        ["Premio" => "Canadá", "Posicion" => 1],
    ],
    "Kimi Räikkönen" => [
        ["Premio" => "Australia", "Posicion" => 3],
        ["Premio" => "Baréin", "Posicion" => "Abandonou"],
        ["Premio" => "China", "Posicion" => 3],
        ["Premio" => "Azerbaiyán", "Posicion" => 2],
        ["Premio" => "España", "Posicion" => "Abandonou"],
        ["Premio" => "Mónaco", "Posicion" => 4],
        ["Premio" => "Canadá", "Posicion" => 6],
    ],
    "Max Verstappen" => [
        ["Premio" => "Australia", "Posicion" => 6],
        ["Premio" => "Baréin", "Posicion" => "Abandonou"],
        ["Premio" => "China", "Posicion" => 5],
        ["Premio" => "Azerbaiyán", "Posicion" => "Abandonou"],
        ["Premio" => "España", "Posicion" => 3],
        ["Premio" => "Mónaco", "Posicion" => 9],
        ["Premio" => "Canadá", "Posicion" => 4],
    ],
    "Valtteri Bottas" => [
        ["Premio" => "Australia", "Posicion" => 8],
        ["Premio" => "Baréin", "Posicion" => 2],
        ["Premio" => "China", "Posicion" => 2],
        ["Premio" => "Azerbaiyán", "Posicion" => 14],
        ["Premio" => "España", "Posicion" => 2],
        ["Premio" => "Mónaco", "Posicion" => 5],
        ["Premio" => "Canadá", "Posicion" => 2],
    ],
];


$puntuacion = [
    "Primeiro" => 25,
    "Segundo" => 18,
    "Terceiro" => 15,
    "Cuarto" => 12,
    "Quinto" => 10,
    "Sexto" => 8,
    "Séptimo" => 6,
    "Octavo" => 4
];


$pilotoSeleccionado = $_POST['grupo'];

$totalProbas = count($pilotos['Premio']);

$totalPuntos = 0;

foreach ($pilotos[$pilotoSeleccionado] as $premio => $posicion) {
                
    foreach ($puntuacion as $posicionPuntos => $puntos) {
        if($posicion == $posicionPuntos[0]+1){
            $totalPuntos = $puntos;
        }
    }
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
    <h1>Fórmula 1</h1>
    <p>A clasificación de  <?php echo $pilotoSeleccionado?> é: </p>
    <table>
        <tr>
            <th>Nombre</th>
            <th>Posición</th>
            <th>Puntos</th>

        </tr>

        <?php
            foreach ($pilotos as $piloto) {
                echo "<tr>
                <td>{$piloto['Premio']}</td>
                <td>{$piloto['Posicion']}</td>
                <td>{$totalPuntos}</td>
              </tr>";
            }
        ?>

    </table>

    <p>Logo de <?php echo $totalProbas?> probas <?php echo $pilotoSeleccionado?> leva <?php echo $puntos?> puntos  </p>

    <form action="5.html" method="get">
    <button type="submit" class="boton">Volver atrás</button>
</form>
    
</body>
</html>

