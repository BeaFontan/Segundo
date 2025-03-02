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

            sort($puntuacion);
            $copiaAsort = $puntuacion;

            rsort($puntuacion);
            $copiaRsort = $puntuacion;

            //ojo, tengo que volver a poner el array original porque con estas funciones pierde los indices

            $puntuacion = array("Ana"=>123, "Belén"=>14,"Felipe"=>3,"Moncho"=>245,"Artur"=>10);

            asort($puntuacion);
            $copiaAsor = $puntuacion;

            arsort($puntuacion);
            $copiaARsort = $puntuacion;

            ksort($puntuacion);
            $copiaKsort = $puntuacion;

            shuffle($puntuacion);
            $copiaShuffle = $puntuacion;

            $puntuacion = array("Ana"=>123, "Belén"=>14,"Felipe"=>3,"Moncho"=>245,"Artur"=>10);


            // Funcións e resultados
            $funciones = [
                [
                    'nome' => 'sort()',
                    'explicacion' => 'Sort an array and maintain index association',
                    'exemplo' => 'asort($puntuacion)',
                    'pantalla' => $copiaAsort,
                ],
                [
                    'nome' => 'rsort( )',
                    'explicacion' => 'Sort an array in reverse order',
                    'exemplo' => 'rsort($puntuacion)',
                    'pantalla' => $copiaRsort,
                ],
                [
                    'nome' => 'asort()',
                    'explicacion' => 'Sort an array and maintain index association',
                    'exemplo' => 'asort($puntuacion)',
                    'pantalla' => $copiaAsor,
                ],
                [
                    'nome' => 'arsort()',
                    'explicacion' => 'Sort an array in reverse order and maintain index association',
                    'exemplo' => 'arsort($puntuacion)',
                    'pantalla' => $copiaARsort,
                ],
                [
                    'nome' => 'ksort()',
                    'explicacion' => 'Sort an array by key',
                    'exemplo' => 'ksort($puntuacion)',
                    'pantalla' => $copiaKsort,
                ],
                [
                    'nome' => 'shuffle()',
                    'explicacion' => 'Shuffle an array',
                    'exemplo' => 'shuffle($puntuacion)',
                    'pantalla' => $copiaShuffle,
                ],
                [
                    'nome' => 'array_reverse()',
                    'explicacion' => 'Return an array with elements in reverse order',
                    'exemplo' => 'array_reverse($puntuacion)',
                    'pantalla' => $copia = array_reverse($puntuacion),
                ]
            ];

            foreach ($funciones as $funcion) {
                echo "<tr>
                        <td>{$funcion['nome']}</td>
                        <td>{$funcion['explicacion']}</td>
                        <td>{$funcion['exemplo']}</td><td>";

                        foreach ($funcion['pantalla'] as $nome=>$puntos){
                            echo "</br>";
                            echo "{$nome} => {$puntos}";
                        }; 
                          echo "</br>";
                          echo "</td>";
                    "</tr>";
            }
            ?>
        </tbody>
    </table>

</body>

</html>