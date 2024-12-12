/*Facer un programa que pida un texto ó usuario e o converta nun array bidimensional de palabras e letras
 (emprega a función splitLetters que se proporciona). O array débese percorrer cun bucle while para as palabras e un bucle 
 for para as letras de cada palabra, para conseguir o mesmo texto sen as vocais e mostralo nunha ventá emerxente.*/

let texto = prompt("Dime un texto");//VAriable para recoger el texto introducido por el usuario
let arrayPalabras = texto.split(' '); // Dividimos el texto en palabras
let resultado = ''; // Variable para almacenar el texto tranformado
let i = 0; // Variable de control para el bucle while

// Bucle while para recorrer el array de palabras
while (i < arrayPalabras.length) {
    let palabra = arrayPalabras[i].split(''); // Convertimos cada palabra en un array de letras
    
    // Bucle for para recorrer las letras de la palabra
    for (let j = 0; j < palabra.length; j++) {
        let letra = palabra[j]; // Recogemos en el array la letra actual
        
        // Si la letra no es una vocal, la añadimos al resultado
        if (letra != 'a' && letra != 'e' && letra != 'i' && letra != 'o' && letra != 'u') {
            resultado += letra;
        }
    }

    // Añadimos un espacio después de cada palabra
    resultado += ' ';
    
    i++; // Incrementamos la variable de control para el bucle while
}

alert(resultado.trim()); // Eliminamos el espacio extra al final y mostramos el resultado
