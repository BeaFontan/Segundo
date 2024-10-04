<!DOCTYPE html>
<html lang="gl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        body{
            background-color: green;
            color:white;
        }
        table {
            border-collapse: collapse;
            width: 100%;
            margin: 20px 0;
        }

        th,
        td {
            border: 1px solid white;
            padding: 8px;
            text-align: left;
        }

        th {
            color: greenyellow;
        }

        h1{
            text-align: center;
        }

        h3{
            text-align: center;
        }
    </style>
</head>

<body>

    <img src="foto.png" alt="foto" width="100px" heigth="100px">

    <h1>Biblioteca</h1>

    <h3>Operacións cos exemplares</h3>

    <label for="buscar">Buscar exemplar</label>
    <textarea name="texto" id="texto" value="texto"></textarea>
    <input type="submit" id ="buscar" name="boton" value="buscar" >
    </br>

    <input type="submit" id ="buscar" name="boton" value="Ver listado completo da biblioteca">
    </br>

    <input type="submit" id ="buscar" name="boton"  value="Ver listado completo ordenador polo título">

    </br>

    <hr/>

    <table>
        <thead>
            <tr>
                <th>Título</th>
                <th>Autor</th>
                <th>Editorial</th>
            </tr>
        </thead>
        <tbody>

            <?php
            $libros = [
                [
                    'El médico' => ['Noah Gordon','Time Warner'],
                ],
                [
                    'Marina' => ['Carlos Ruíz Zafón', 'Edebé']
                ],
                [
                    'La hoguera de las vanidades'=> ['Tom Wolfe', 'RBA editores']
                ],
                [
                    'El libro de las ilusiones'=> ['Paul Auster','Faber']
                ],
                [
                    'La muerte en Venecia' => ['Michael Man', 'Anaya']
                ],
                [
                    'A Sangre fría' =>['Truman Capote', 'Illusions']
                ],            
                [
                    '2001: Odisea en el espacio' => ['Arthur C. Clarke','P&J']
                ],
            ];

            $boton = '';
            $texto = '';

            if (isset($_GET["boton"])) {

                $boton = $_GET["boton"];

                switch ($boton) {
                    case 'buscar':
                        case 'Ver listado completo da biblioteca':
    
    
                        break;
                    case 'Ver listado completo da biblioteca':
                        foreach ($libros as $libro) {
                            echo "<tr>
                                    <td>{$libro}</td>
                                    <td>{$libros[1]}</td>
                                    <td>{$libros[2]}<td>
                                </tr>";
                        }
                        break;  
                    case 'Ver listado completo ordenador polo título':
                        
                        break;    
    
                }
                
            } 


            ?>
        </tbody>
    </table>

    <p>O número de exemplares atopados é: </p>

</body>

</html>