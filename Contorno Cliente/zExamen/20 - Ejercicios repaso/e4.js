/*Write a JavaScript function that accepts a string as a parameter and converts the
first letter of each word of the string in upper case.
Example string : 'the quick brown fox'
Expected Output : 'The Quick Brown Fox '*/

function mayusculas() {
    
    let frase = "Hola que tal";

    arrayPalabras = frase.split(' ');
    let arrayMayus = "";

    for (const palabra of arrayPalabras) {
        let letraMayus = palabra.substring(0,1).toUpperCase();
        console.log()
        let restoPalabra = palabra.substring(1,palabra.lenght)
        let palabraEntera = letraMayus+restoPalabra;

        arrayMayus += palabraEntera + " ";
    }

    console.log(arrayMayus);
}

mayusculas();