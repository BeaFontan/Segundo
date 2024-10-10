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
        
    <form action="ex3.php" method="GET">
        <label for="buscar">Buscar exemplar</label>
        <textarea name="texto" id="texto" value="texto"></textarea>
        <input type="submit" id ="buscar" name="boton" value="buscar" >
        </br>

        <input type="submit" id ="buscar" name="boton" value="Ver listado completo da biblioteca">
        </br>

        <input type="submit" id ="buscar" name="boton"  value="Ver listado completo ordenador polo título">
        </br>
    </form>

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
                
                'El médico' => ['Noah Gordon','Time Warner'],
               
                'Marina' => ['Carlos Ruíz Zafón', 'Edebé'],
                
                'La hoguera de las vanidades'=> ['Tom Wolfe', 'RBA editores'],
                
                'El libro de las ilusiones'=> ['Paul Auster','Faber'],
                
                'La muerte en Venecia' => ['Michael Man', 'Anaya'],
                
                'A Sangre fría' =>['Truman Capote', 'Illusions'],            
                
                '2001: Odisea en el espacio' => ['Arthur C. Clarke','P&J']
            ];

            $boton = '';
            $texto = '';
            $cuenta = 0;

            if (isset($_GET["boton"])) {

                $boton = $_GET["boton"];

                switch ($boton) {
                    case 'buscar':

                        $texto = $_GET["texto"];

                        foreach ($libros as $titulo => $libro) {

                            if (strcmp($titulo, $texto) == 0) {
                                echo "<tr>
                                <td>{$titulo}</td>
                                <td>{$libro[0]}</td>
                                <td>{$libro[1]}</td>";
                            echo "</tr>";

                            $cuenta ++;
                            }
                        }

                        break;
                    case 'Ver listado completo da biblioteca':
                        foreach ($libros as $titulo => $libro) {
                            echo "<tr>
                                    <td>{$titulo}</td>
                                    <td>{$libro[0]}</td>
                                    <td>{$libro[1]}</td>";
                            echo "</tr>";
                            $cuenta ++;
                        }
                        
                        break;  
                    case 'Ver listado completo ordenador polo título':

                        ksort($libros);
                        foreach ($libros as $titulo => $libro) {
                            echo "<tr>
                                    <td>{$titulo}</td>
                                    <td>{$libro[0]}</td>
                                    <td>{$libro[1]}</td>";
                            echo "</tr>";
                            $cuenta ++;
                        }
                        break;    
                }
            } 

            echo "<p>O número de exemplares atopados é: {$cuenta}</p>"
            ?>
        </tbody>
    </table>



</body>

</html>