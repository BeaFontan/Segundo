
// Beatriz Fontán Padín

// Tabla de letras para devolver al usuario según el cálculo
const letrasDNI = ['T', 'R', 'W', 'A', 'G', 'M', 'Y', 'F', 'P', 'D', 'X', 'B', 'N', 'J', 'Z', 'S', 'Q', 'V', 'H', 'L', 'C', 'K', 'E'];

// Solicitud del número de DNI al usuario
let dni = prompt("Introduce el número de tu DNI (8 dígitos):");

// Comprobación de errores
if (dni === null || dni === "") {
    alert("No has introducido ningún número.");
} else if (dni.length !== 8) {
    alert("El número de DNI debe tener 8 dígitos.");
} else if (isNaN(dni)) {
    alert("El valor introducido no es un número válido.");
} else {
    // Cálculo del resto y obtención de la letra correspondiente
    let resto = dni % 23;
    let letra = letrasDNI[resto];

    // Muestra el resultado al usuario
    alert("La letra correspondiente a tu DNI es: " + letra);
}
