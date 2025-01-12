/*Write a JavaScript function that reverse a number.
Sample Data and output:
Example x = 32243;
Expected Output : 34223
*/

function reverse() {
    let numeros = "12345678";
    let numerosReverse = "";

   for (let i = numeros.length-1; i > -1; i--) {
        numerosReverse += numeros[i];
   }

   console.log(numerosReverse)
}

reverse();