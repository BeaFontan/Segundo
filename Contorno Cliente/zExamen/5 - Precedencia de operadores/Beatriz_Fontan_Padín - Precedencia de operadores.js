//Probar a execución de varias expresións con ou sen parénteses (()), para comprobar a precedencia de uns operadores sobre outros.

//Designación de variables
let $numero1 = 5;
let $numero2 = 3;
let $resultado;

//Operaciones

//Prando () y - y *
$resultado = ($numero1-$numero2)*$numero1;
console.log($resultado);

$resultado = ($numero1 % $numero2)+$numero1**$numero2;
console.log($resultado);

//probando <, ==, > and or
if ($numero1 >= $numero2){
  console.log($numero1 + " es mayor o igual que " + $numero2 );

} else if ($numero1 <= $numero2){
  console.log($numero1 + " es menor o igual que " + $numero2);
} else{
  console.log($numero1 + " es igual que " + $numero2)
}

