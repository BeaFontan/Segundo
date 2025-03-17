// 5. Tu tarea es ordenar una cadena determinada. Cada palabra de la cadena contendrá un único 
// número. Este número es la posición que debe tener la palabra en el resultado.

//  Nota: Los números pueden ser del 1 al 9. Por lo tanto, 1 será la primera palabra (no 0).
//  Si la cadena de entrada está vacía, devuelve una cadena vacía. Las palabras en la cadena de entrada 
// solo contendrán números consecutivos válidos.

//  Ejemplos
//  "este2 e1s T4est u3n"  -->  "Est1e es2 u3n T4est"
//  "4de pa1ra ge "este2 e1s T4est u3n"  -->  "Est1e es2 u3n T4est"
//  "4de pa1ra ge6nte b3ien l5a el2"  -->  "Pa1ra el2 b3ien 4de l5a ge6nte"
//  ""  -->  ""

function ordenarCadena(cadena) {
    // Verificar si la cadena está vacía
    if (cadena === "") {
      return "";
    }
  
    // Dividir la cadena en palabras
    const palabras = cadena.split(" ");
  
    // Ordenar las palabras según el número que contienen
    palabras.sort((a, b) => {
      const numA = a.match(/\d/)[0]; // Extraer el número de la palabra a
      const numB = b.match(/\d/)[0]; // Extraer el número de la palabra b
      return numA - numB; // Ordenar por el número
    });
  
    // Unir las palabras ordenadas en una sola cadena
    return palabras.join(" ");
  }

  console.log("este2 e1s T4est u3n")