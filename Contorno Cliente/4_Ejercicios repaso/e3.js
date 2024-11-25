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