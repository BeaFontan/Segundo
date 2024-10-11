<!DOCTYPE html>
<html lang="gl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
        
    <form action="6.php" method="GET">

        <input type="submit" id ="buscar" name="boton" value="Ordenar alfabéticamente polo nome da orixe">
        </br>

        <input type="submit" id ="buscar" name="boton"  value="Ordenar alfabéticamente polo nome da orixe descendente">
        </br>

        <input type="submit" id ="buscar" name="boton" value="Ordenar alfabéticamente polo nome do destino">
        </br>

        <input type="submit" id ="buscar" name="boton"  value="Ordenar alfabéticamente polo nome da destino descendente">
        </br>

        <input type="submit" id ="buscar" name="boton" value="Ordenar pola distancia de maior a menor">
        </br>

        <input type="submit" id ="buscar" name="boton"  value="Ordenar pola distancia de menor a maior">
        </br>
    </form>

        <?php
        $viaxes = [
            ["Madrid", "Segovia", 90201],
            ["Madrid", "A Coruña", 596887],
            ["Barcelona", "Cádiz", 1152669],
            ["Bilbao", "Valencia", 622233],
            ["Sevilla", "Santander", 832067],
            ["Oviedo", "Badajoz", 682429],
        ];

        $boton = '';

        if (isset($_GET["boton"])) {

            $boton = $_GET["boton"];

            switch ($boton) {
                case 'Ordenar alfabéticamente polo nome da orixe':
        
                    function menorAmaior($a, $b)
                    {
                        return strcmp($b, $a);
                    }

                    usort($viaxes[0], 'menorAmaior');//No me ordena bien, mecagoenlaputa

                    foreach ($viaxes as $viaxe) {
                        echo "{$viaxe[0]} -> {$viaxe[1]} -> {$viaxe[2]} </br>";
                    }

                    break;

                case 'Ordenar alfabéticamente polo nome da orixe descendente':
                    
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
                case 'Ordenar alfabéticamente polo nome do destino':

                    ksort($puntos);

                    foreach ($puntos as $key=>$valor) {
                        echo "{$key} -> {$valor} </br>";
                    }

                    break;  
                case 'Ordenar alfabéticamente polo nome da destino descendente':

                    function menorAmaior($a, $b)
                    {
                        return strcmp($b, $a);
                    }

                    uksort($puntos, 'menorAmaior');

                    foreach ($puntos as $key=>$valor) {
                        echo "{$key} -> {$valor} </br>";
                    }

                    break;    

                case 'Ordenar pola distancia de maior a menor':

                    function menorAmaior($a, $b)
                    {
                        return strcmp($b, $a);
                    }

                    uksort($puntos, 'menorAmaior');

                    foreach ($puntos as $key=>$valor) {
                        echo "{$key} -> {$valor} </br>";
                    }

                    break;    

                case 'Ordenar pola distancia de menor a maior':

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