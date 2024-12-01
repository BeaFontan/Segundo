// Beatriz Fontán Padín

let nota; // Declaración de variable para almacenar la nota

nota = parseFloat(prompt("Introduce la nota que has obtenido: ")); // Obtenemos la nota del usuario y procesamos para conseguir el número

let categoria; // Declaración de variable que almacenará el texto correspondiente a la nota

// Asignar la categoría dependiendo de la nota para luego poder procesar en switch
if (nota >= 9 && nota <= 10) {
    categoria = "Sobresaliente";
} else if (nota >= 7 && nota < 9) {
    categoria = "Notable";
} else if (nota >= 6 && nota < 7) {
    categoria = "Bien";
} else if (nota >= 5 && nota < 6) {
    categoria = "Suficiente";
} else if (nota >= 0 && nota < 5) {
    categoria = "Insuficiente";
} else {
    categoria = "Invalida";
}

// Usar el switch para mostrar la calificación según la nota procesada
switch (categoria) {
    case "Sobresaliente":
        alert("Sobresaliente");
        break;
    case "Notable":
        alert("Notable");
        break;
    case "Bien":
        alert("Bien");
        break;
    case "Suficiente":
        alert("Suficiente");
        break;
    case "Insuficiente":
        alert("Insuficiente");
        break;
    default:
        alert("Nota no válida. Rango de 0 a 10");
        break;
}
