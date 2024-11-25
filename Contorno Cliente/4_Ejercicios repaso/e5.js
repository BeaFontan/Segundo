function fecha() {
    
    let fechaActual = new Date();

    let dia = fechaActual.getDate();
    let mes = fechaActual.getMonth()+1;
    let anho = fechaActual.getFullYear();

    console.log(mes+"-"+dia+"-"+anho);
    console.log(mes+"/"+dia+"/"+anho);
    console.log(dia+"-"+mes+"-"+anho);
    console.log(dia+"/"+mes+"/"+anho);



}

fecha();