//Probar a execución de varias expresións con ou sen parénteses (()), para comprobar a precedencia de uns operadores sobre outros.
var variable = 12;

variable = "Azul";

if(variable === "Azul") {
  //variable = true;
  
    console.log(variable);
} else {
  variable = 12.0;
  
  console.log(variable);
}


//Ambito Local

if(variable === "Azul") {
 let variable = true;
  
  console.log(variable);
} else {
 let variable = 12.0;
  
  console.log(variable);
}

console.log(variable);