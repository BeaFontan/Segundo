
//Crear un script que calcule a diferencia de días entre dúas datas. Estas poden ser introducidas en milisegundos ou nun formato de texto válido.

// Solicitar las fechas al usuario
const fechaInicio = prompt("Introduce la primera fecha (en milisegundos o en un formato de texto válido como 'YYYY-MM-DD'):");
const fechaFin = prompt("Introduce la segunda fecha (en milisegundos o en un formato de texto válido como 'YYYY-MM-DD'):");

// Convertir las fechas en objetos Date
const fecha1 = typeof fechaInicio === "number" ? new Date(parseInt(fechaInicio)) : new Date(fechaInicio);
const fecha2 = typeof fechaFin === "number" ? new Date(parseInt(fechaFin)) : new Date(fechaFin);

// Verificar que ambas fechas son válidas
if (!isNaN(fecha1) && !isNaN(fecha2)) {
    // Calcular la diferencia en milisegundos
    const diferenciaMilisegundos = Math.abs(fecha2 - fecha1);

    // Convertir la diferencia de milisegundos a días
    const diferenciaDias = Math.floor(diferenciaMilisegundos / (1000 * 60 * 60 * 24));

    // Mostrar el resultado al usuario
    alert("La diferencia entre las dos fechas es de " + diferenciaDias + " días.");
} else {
    alert("Una o ambas fechas no son válidas. Por favor, introduce fechas en milisegundos o en un formato de texto válido.");
}