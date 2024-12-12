//Facer un programa que pida a nota numérica dun alumno e a mostre nunha ventá emerxente en forma de texto (Sobresaliente, Notable, Ben, Suficiente, Insuficiente), empregando if-else if-else.

let nota;//Declaración de variable

nota = parseFloat(prompt("Introduce la nota que has obtenido: ")) //Obtenemos el valor introducido por el usuario y lo convertimos en número decimal para poder procesarlo

//Procesamos la nota introducida por el usuario y mostramos el valor correspondiente
if (nota >= 9 && nota <=10) {
    alert("Sobresaliente");
} else if (nota >= 7 && nota < 9 ) {
    alert("Notable");
} else if (nota >= 6 && nota < 7 ) {
    alert("Bien");
} else if (nota >= 5 && nota < 6 ) {
    alert("Suficiente");
} else if (nota >= 0 && nota < 5 ) {
    alert("Insuficiente");
} else {
    alert("Nota no válida. Rango de 0 a 10")
}