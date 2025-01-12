/*Write a JavaScript program to calculate number of days left until next Christmas.*/

function navidad() {
    
let hoy = new Date();

let navidad = new Date(hoy.getFullYear(),11,25);

let milisegundosRestantes = navidad - hoy;

let diasRestantes = Math.ceil(milisegundosRestantes / (1000 * 60 * 60 * 24));

console.log(diasRestantes)
}

navidad();