<!DOCTYPE html>
<html lang="gl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Funcións de Tratamento de Cadeas en PHP</title>
    <style>
        table {
            border-collapse: collapse;
            width: 100%;
            margin: 20px 0;
        }

        th,
        td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: black;
            color: yellow;
        }
    </style>
</head>

<body>
    <h1>Ordenamento de Arrays en PHP</h1>

    <table>
        <thead>
            <tr>
                <th>Nome Función</th>
                <th>Explicación do que fai</th>
                <th>Exemplo</th>
                <th>Mostra por pantalla</th>
            </tr>
        </thead>
        <tbody>
            
            <?php
            $puntuacion = array("Ana"=>123, "Belén"=>14,"Felipe"=>3,"Moncho"=>245,"Artur"=>10);

            // Funcións e resultados
            $funciones = [
                [
                    'nome' => 'sort()',
                    'explicacion' => 'Sort an array and maintain index association',
                    'exemplo' => $copia = asort($puntuacion),
                    'pantalla' => print_r($copia),
                ],
                [
                    'nome' => 'rsort( )',
                    'explicacion' => 'Sort an array in reverse order',
                    'exemplo' => $copia = rsort($puntuacion),
                    'pantalla' => $copia,
                ],
                [
                    'nome' => 'asort()',
                    'explicacion' => 'Sort an array and maintain index association',
                    'exemplo' => $copia = asort($puntuacion),
                    'pantalla' => $copia,
                ],
                [
                    'nome' => 'arsort()',
                    'explicacion' => 'Sort an array in reverse order and maintain index association',
                    'exemplo' => $copia = arsort($puntuacion),
                    'pantalla' => $copia,
                ],
                [
                    'nome' => 'ksort()',
                    'explicacion' => 'Sort an array by key',
                    'exemplo' => $copia = ksort($puntuacion),
                    'pantalla' => $copia,
                ],
                [
                    'nome' => 'shuffle()',
                    'explicacion' => 'Shuffle an array',
                    'exemplo' => $copia = shuffle($puntuacion),
                    'pantalla' => $copia,
                ],
                [
                    'nome' => 'array_reverse()',
                    'explicacion' => 'Return an array with elements in reverse order',
                    'exemplo' => $copia = array_reverse($puntuacion),
                    'pantalla' => $copia,
                ]
            ];

            foreach ($funciones as $funcion) {
                echo "<tr>
                        <td>{$funcion['nome']}</td>
                        <td>{$funcion['explicacion']}</td>
                        <td>{$funcion['exemplo']}</td>
                        <td>{$funcion['pantalla']}</td>
                    </tr>";
            }
            ?>
        </tbody>
    </table>

</body>

</html>