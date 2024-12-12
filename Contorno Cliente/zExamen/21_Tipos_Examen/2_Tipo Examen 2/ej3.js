// 3.Número de Likes
//  Escribe una función llamada likes que reciba un número y retorne un string utilizando el formato 
// de K para miles y M para millones.
//  Por ejemplo:
//  • 1400 se convierte en 1K 
// • 34,567 se convierte en 34K 
// • 7’456,345 se convierte en 7M. 
// Si el número es menor a 1000 se debe devolver el mismo número como un string.



 // escribe tu respuesta acá





 // código de prueba
 console.log(likes(983)) // "983"
 console.log(likes(1900)) // "1K"
 console.log(likes(54000)) // "54K"
 console.log(likes(120800)) // "120K"
 console.log(likes(25222444)) // "25M"