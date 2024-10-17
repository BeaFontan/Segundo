<?php
$num1 = intval($_GET["n1"]);
$num2 = intval($_GET["n2"]);
$num3 = intval($_GET["n3"]);
$num4 = intval($_GET["n4"]);

function suma2($num1, $num2)
{
    return $num1 + $num2;
}

function suma3($num1, $num2, $num3)
{
    return $num1 + $num2 + $num3;;
}

function suma4($num1, $num2, $num3, $num4)
{
    return $num1 + $num2 + $num3 + $num4;;
}

function multiplica2($num1, $num2)
{
    return $num1 * $num2;
}

function multiplica3($num1, $num2, $num3)
{
    return $num1 * $num2 * $num3;
}

function multiplica4($num1, $num2, $num3, $num4)
{
    return $num1 * $num2 * $num3 * $num4;
}

function maior($num1, $num2, $num3, $num4)
{
    return max($num1, $num2, $num3, $num4);
}

function menor($num1, $num2, $num3, $num4)
{
    return min($num1, $num2, $num3, $num4);
}

function media($num1, $num2, $num3, $num4)
{
    $res = suma4($num1, $num2, $num3, $num4) / 4;
    return $res;
}

function factorialN3($num3)
{
    $res = 1;
    for ($i = 1; $i <= $num3; $i++) {
        $res *= $i;
    }
    return $res;
}

function mediana($num1, $num2, $num3, $num4)
{
    $numeros = [$num1, $num2, $num3, $num4];

    sort($numeros);

    return ($numeros[1] + $numeros[2]) / 2;
}

function segundoMaior($num1, $num2, $num3, $num4)
{
    $array = array($num1, $num2, $num3, $num4);
    rsort($array);
    return $array[1];
}

function ordearMaiorMenor($num1, $num2, $num3, $num4)
{
    $numeros = [$num1, $num2, $num3, $num4];
    rsort($numeros);
    return implode(", ", $numeros);
}

function ordearMenorMaior($num1, $num2, $num3, $num4)
{
    $numeros = [$num1, $num2, $num3, $num4];
    sort($numeros);
    return implode(", ", $numeros);
}

$operacion = $_GET['operacion'];

switch ($operacion) {
    case 'suma2':
        echo "Resultado de suma é: " . suma2($num1, $num2);
        break;
    
    case 'suma3':
        echo "Resultado de suma é: " . suma3($num1, $num2, $num3);
        break;
    
    case 'suma4':
        echo "Resultado de suma é: " . suma4($num1, $num2, $num3, $num4);
        break;
    
    case 'multiplica2':
        echo "Resultado de multiplicación é: " . multiplica2($num1, $num2);
        break;
    
    case 'multiplica3':
        echo "Resultado de multiplicación é: " . multiplica3($num1, $num2, $num3);
        break;
    
    case 'multiplica4':
        echo "Resultado de multiplicación é: " . multiplica4($num1, $num2, $num3, $num4);
        break;
    
    case 'maior':
        echo "Maior valor: " . maior($num1, $num2, $num3, $num4);
        break;
    
    case 'menor':
        echo "Menor valor: " . menor($num1, $num2, $num3, $num4);
        break;
    
    case 'media':
        echo "Media: " . media($num1, $num2, $num3, $num4);
        break;
    
    case 'factorialN3':
        echo "Factorial de n3: " . factorialN3($num3);
        break;
    
    case 'segundoMaior':
        echo "Segundo maior valor: " . segundoMaior($num1, $num2, $num3, $num4);
        break;

    case 'mediana':
        echo "Mediana: " . segundoMaior($num1, $num2, $num3, $num4);
        break;
    
    case 'ordearMarioMenor':
        echo "Orde de maior a menor: " . ordearMaiorMenor($num1, $num2, $num3, $num4);
        break;
    
    case 'ordearManorMaior':
        echo "Orde de menor a maior: " . ordearMenorMaior($num1, $num2, $num3, $num4);
        break;
}
