<!DOCTYPE html>
<html lang="gl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
        
    <form action="5.php" method="GET">

        <input type="submit" id ="buscar" name="boton" value="Ordenar por punto de menor a maior">
        </br>

        <input type="submit" id ="buscar" name="boton"  value="Ordenar por puntos de maior a menor">
        </br>

        <input type="submit" id ="buscar" name="boton"  value="Ordenar polo nome alfabéticamente">
        </br>

        <input type="submit" id ="buscar" name="boton"  value="Ordenar polo tamaño do nome">
        </br>
    </form>

        <?php
        $puntos = array('Ana'=>123, 'Belén'=>14,'Felipe'=>3,'Moncho'=>245,'Artur'=>10);
        $boton = '';

        if (isset($_GET["boton"])) {

            $boton = $_GET["boton"];

            switch ($boton) {
                case 'Ordenar por punto de menor a maior':
        
                    function menorAmaior($a,$b)
                    {
                        if($a<$b)
                            return -1;
                        elseif ($a>$b)
                            return 1;
                        else
                            return 0;
                    }

                    uasort($puntos, 'menorAmaior');

                    foreach ($puntos as $key=>$valor) {
                        echo "{$key} -> {$valor} </br>";
                    }
                    break;
                case 'Ordenar por puntos de maior a menor':
                    
                    function menorAmaior($a,$b)
                    {
                        if($a>$b)
                            return -1;
                        elseif ($a<$b)
                            return 1;
                        else
                            return 0;
                    }

                    uasort($puntos, 'menorAmaior');

                    foreach ($puntos as $key=>$valor) {
                        echo "{$key} -> {$valor} </br>";
                    }
                    
                    break;  
                case 'Ordenar polo nome alfabéticamente':

                    ksort($puntos);

                    foreach ($puntos as $key=>$valor) {
                        echo "{$key} -> {$valor} </br>";
                    }

                    break;  
                case 'Ordenar polo tamaño do nome':

                    function menorAmaior($a, $b)
                    {
                        return strcmp($b, $a);
                    }

                    uksort($puntos, 'menorAmaior');

                    foreach ($puntos as $key=>$valor) {
                        echo "{$key} -> {$valor} </br>";
                    }

                    break;    
            }
        } 
        ?>
</body>

</html>