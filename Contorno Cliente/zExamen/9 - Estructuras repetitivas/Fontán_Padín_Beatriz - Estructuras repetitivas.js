//Facer un programa que pida un texto ó usuario e o percorra para mostrar nunha ventá emerxente o mesmo texto sen as vocais, empregando os bucles while, do-while e for, e a sentencia continue.

//Bucle for

let texto = prompt("Dime un texto"); // Variable para recoger el texto que nos introduce el usuario
let resultado = ''; // variable para recoger el texto transformado

// Bucle para recorrer el texto
for (let i = 0; i < texto.length; i++) {

    if (texto[i] != "a" && texto[i] != "e" && texto[i] != "i" && texto[i] != "o" && texto[i] != "u") {  // Si el carácter no es una vocal
        resultado += texto[i];//Lo añadimos a la variable de resultado
    }
}

alert(resultado);//Mostramos el resultado



//Bucle Do while

let texto2 = prompt("Dime un texto"); // Recoge el texto introducido
let resultado2 = ''; //variable para recoger el texto transformado
i = 0; // reiniciamos el valor de i para volver a utilizarlo

// Bucle para recorrer el texto
do {
    // Si el carácter no es una vocal, lo añadimos al resultado
    if (texto2[i] != "a" && texto2[i] != "e" && texto2[i] != "i" && texto2[i] != "o" && texto2[i] != "u") {
        resultado2 += texto2[i];//Lo añadimos a la variable de resultado
    }
    i++;//y aumentamos la variable de control para seguir recorriendo el texto
} while (i < texto2.length);// Condición para continuar recorriendo el texto

alert(resultado2);//Mostramos el resultado



//Bucle while y continue

let texto3 = prompt("Dime un texto");//recogemos el texto que nos introduce el usuario
let resultado3 = '';//variable para almacenar el texto transformado
i = 0; //Reiniciamos el valor de variable de control para volver a utilizarla

while (i < texto3.length) {
    // Si el texto contine una vocal 
    if ("aeiou".includes(texto3[i])) {
        i++;//aumenta la variable de control
        continue; //y continua con la siguiente comprobación
    }

    // Si encuentra una vocal
    resultado3 += texto3[i];//se añade a la variable de transformación
    i++;//aumentamos la variable de control
}

alert(resultado3);//Mostramos el resultado