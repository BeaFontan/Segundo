/*Facer un programa que pida un texto ó usuario, cree un array coas letras do texto (coa función split) e
 percorra o array para mostrar nunha ventá emerxente o mesmo texto sen as vocais, empregando os bucles for-of e for-in, e a sentencia continue.*/

//For-in

let texto = prompt("Dime un texto"); //Almacenamos el texto introducido en el usaurio.
let letras = texto.split(''); // Conviertimos el texto en un array de caracteres
let resultado = ''; // Variable para almacenar el texto transfomrado

// Bucle para recorrer el array de letras utilizando for-in
for (let letra in letras) {
    // Si la letra es una vocal saltamos la interación
    if ("aeiou".includes(letras[letra])) {
        continue; //Continua recorriendo
    }
    
    resultado += letras[letra];// Si no es vocal, añadimos la letra al resultado utilizando indice
}

alert(resultado);// Mostramos el resultado


//For-of

//Beatriz Fontán Padín

let texto2 = prompt("Dime un texto"); // Almacenamos el texto introducido por el usuario
let letras2 = texto2.split(''); // Convertimos el texto en un array de caracteres
let resultado2 = ''; // Variable para almacenar el texto transformado

// Bucle para recorrer el array de letras utilizando for-of, sin indice
for (let letra of letras2) {
    // Si la letra es una vocal, saltamos la iteración
    if ("aeiou".includes(letra)) { // Comprobamos si la letra es vocal
        continue; //Continua recorriendo
    }

    resultado2 += letra; // Si no es vocal, añadimos la letra al resultado
}

alert(resultado2); // Mostramos el resultado
