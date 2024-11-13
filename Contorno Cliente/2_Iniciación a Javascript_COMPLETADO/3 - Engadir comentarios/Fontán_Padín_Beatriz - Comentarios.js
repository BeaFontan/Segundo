
//Declación de variables que recogen del usuario los valores con los que vamos a trabajar.
var rows = prompt("How many rows?", 9);
var cols = prompt("How many columns?", 9);

/*Comprbación de límites, vamos a limitar que la tabla no tenga más de 9 filas y 9 columnas, 
además de que le requerimos que siempre haya un dato con el null*/
if(rows=="" || rows==null)
    rows = 9;
if(cols=="" || cols==null)
    cols = 9;

//Le pasamos los valores recogidos del usuario a la función programada:
createTable(rows, cols);

//Función para la creación de la tabla que recibe dos enteros:
function createTable(rows, cols) {
	//Apertura de tabla con sus dimensiones
    var output = "<table border='1' width='500' cellspacing='0' cellpadding='5'>";
    output += "<tr>";

	//Bucle para imprimir los números dentro de cada celda
    for(var k=1; k<=cols; k++) {
        output += "<td><b>X " + k + "</b></td>";
    }
    output += "</tr>";
	
	//Bucle para recorrer el total de filas que nos han indicado
    var j=1;
    for(var i=1;i<=rows;i++) {
        output = output + "<tr>";
		
		//Bucle para recorrer el total de columnas
        while(j<=cols) {
            output = output + "<td>" + i*j + "</td>";
            j = j+1;
        }
        output = output + "</tr>";
        j = 1;
    }
	//Cierre de tabla
	output+="</table>"
	
	//Imprimir por pantalla la tabla creada
	document.getElementById("taboa").innerHTML=output}