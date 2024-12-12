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
    <table>
        <thead>
            <tr>
                <th>Nome da función</th>
                <th>Explicación</th>
                <th>Exemplo</th>
            </tr>
        </thead>
        <tbody>
            
            <?php
            // Cadea de exemplo
            $cadena1 = "Hoxe estamos nun 'día de outono' chove, chove!!";
            $cadena2 = "Hola como estás. Encantado de conocerte! Campeón, Lázaro, Lasaña";
            $urlCode = urlencode(urlencode($cadena1));

            echo "<p>{$cadena1}</p>";
            echo "<p>{$cadena2}</p>";

            // Funcións e resultados
            $funciones = [
                [
                    'nome' => 'strlen()',
                    'explicacion' => 'Devolve o número de caracteres da cadea',
                    'exemplo' => strlen($cadena1) . ' caracteres'
                ],
                [
                    'nome' => 'substr()',
                    'explicacion' => 'Obtén unha subcadea a partir dun índice específico',
                    'exemplo' => substr($cadena1, 40, 7)
                ],
                [
                    'nome' => 'strstr()',
                    'explicacion' => 'Busca a primeira aparición dunha subcadea e devolve a parte da cadea desde esa posición',
                    'exemplo' => strstr($cadena1, "outono")
                ],
                [
                    'nome' => 'strchr()',
                    'explicacion' => 'É un sinónimo de strstr()',
                    'exemplo' => strchr($cadena1, "chove")
                ],
                [
                    'nome' => 'strrchr()',
                    'explicacion' => 'Busca a última aparición dunha subcadea e devolve a parte da cadea desde esa posición',
                    'exemplo' => strrchr($cadena1, "estamos")
                ],
                [
                    'nome' => 'strpos()',
                    'explicacion' => 'Busca a posición da primeira aparición dunha subcadea',
                    'exemplo' => strpos($cadena1, "de")
                ],
                [
                    'nome' => 'str_replace()',
                    'explicacion' => 'Substitúe todas as ocorrencias dunha subcadea por outra',
                    'exemplo' => str_replace("día", "mes", $cadena1)
                ],
                [
                    'nome' => 'trim()',
                    'explicacion' => 'Elimina espazos en branco ao principio e ao final da cadea',
                    
                    'exemplo' => trim("   Texto con espacios   ")
                ],
                [
                    'nome' => 'ucfirst()',
                    'explicacion' => 'Convirte a primeira letra da cadea a maiúscula',
                    'exemplo' => ucfirst($cadena1)
                ],
                [
                    'nome' => 'strcmp()',
                    'explicacion' => 'Compara dúas cadeas. Devolve 0 se son iguais, menor que 0 se a primeira é menor, maior que 0 se a primeira é maior.',
                    'exemplo' => strcmp("Holi", "Holita")." Holi, Holita"
                ],
                [
                    'nome' => 'urlencode()',
                    'explicacion' => 'Convierte caracteres especiais en cadeas de texto a un formato seguro para URLs',
                    'exemplo' => $urlCode
                ],
                [
                    'nome' => 'urldecode()',
                    'explicacion' => 'Convierte cadeas de texto codificadas en URL de volta ao seu formato orixinal',
                    'exemplo' => urldecode(urlencode($cadena1))
                ],
                [
                    'nome' => 'mb_strlen()',
                    'explicacion' => 'Devolve o número de caracteres da cadea, considerando os caracteres multibait, acentos, ñ etc.',
                    'exemplo' => mb_strlen($cadena2) . ' caracteres'
                ],
            ];

            // Mostrar as funcións na táboa
            foreach ($funciones as $funcion) {
                echo "<tr>
                    <td>{$funcion['nome']}</td>
                    <td>{$funcion['explicacion']}</td>
                    <td>{$funcion['exemplo']}</td>
                  </tr>";
            }
            ?>
        </tbody>
    </table>

</body>

</html>