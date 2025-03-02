// 2. Escribir una función llamada transcribir que reciba un string (una cadena de ADN) y 
// retorne otro string (su complemento ARN).
//  Los complementos son los siguientes:
//  • G -> C 
// • C -> G 
// • T -> A 
// • A -> U 

// escribe tu función acá

function transcribir(ADN){

    let ARN = "";

    ADN = ADN.toUpperCase();

    for (let i = 0; i < ADN.length; i++) {
      if (ADN[i] === "G") {
        ARN += "C";
      } else if (ADN[i] === "C") {
        ARN += "G";
      } else if (ADN[i] === "T") {
        ARN += "A";
      } else if (ADN[i] === "A") {
        ARN += "U";
      } else {
        throw new Error("Cadena no válida"); // Manejo de errores si el input es incorrecto
      }
    }

    return ARN;
}

 // código de prueba
 console.log(transcribir("ACGT")) // "ugca"
 console.log(transcribir("ACGTGGTCTTAA")) // "UGCACCAGAAUU"