//Beatriz Fontán Padín


//Bucle for

let texto = prompt("Dime un texto"); // Variable para recoger el texto que nos introduce el usuario
let resultado = ''; // Variable para almacenar el texto sin vocales

// Bucle para recorrer el texto
for (let i = 0; i < texto.length; i++) {
    // Si el carácter no es una vocal
    if (texto[i] != "a" && texto[i] != "e" && texto[i] != "i" && texto[i] != "o" && texto[i] != "u") {
        resultado += texto[i];//Lo añadimos a la variable de resultado
    }
}

// Mostrar el texto modificado
alert(resultado);



//Bucle Do while

let texto2 = prompt("Dime un texto"); // Recoge el texto introducido
let resultado2 = ''; // Variable para almacenar el texto sin vocales
i = 0; // Inicializamos la variable de control

// Bucle para recorrer el texto
do {
    // Si el carácter no es una vocal, lo añadimos al resultado
    if (texto2[i] != "a" && texto2[i] != "e" && texto2[i] != "i" && texto2[i] != "o" && texto2[i] != "u") {
        resultado2 += texto2[i];
    }
    i++;
} while (i < texto2.length); // Condición para continuar recorriendo el texto

// Mostrar el texto modificado
alert(resultado2);


//Bucle while

let texto3;
let resultado3;



