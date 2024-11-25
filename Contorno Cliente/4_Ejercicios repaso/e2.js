function letters() {
    let palabra = "imbecil";

    let palabraOrdenada =  palabra.split('').sort().join('');

    console.log(palabraOrdenada);
}

letters();