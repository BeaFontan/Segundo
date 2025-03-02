
/*Write a JavaScript function that accepts a string as a parameter and counts the
number of vowels within the string.
Note : As the letter 'y' can be regarded as both a vowel and a consonant, we do
not count 'y' as vowel here.
Sample Data and output:
Example string : 'The quick brown fox'
Expected Output : 5*/

function vocales() {

    var frase = "Hola que tal";
    var vocales = 'aeiouAEIOU';
    var cuentaVocales = 0;

    for (let i = 0; i < frase.length; i++) {
        for (let x = 0; x < vocales.length; x++) {
            if (frase[i].includes(vocales[x])) {
                console.log(frase[i] + " = " + vocales[x]);
                cuentaVocales +=1;
            }
        }
    }

    console.log(cuentaVocales);
}

vocales();