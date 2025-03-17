/*Write a JavaScript function that returns a passed string with letters in
alphabetical order.
Example string : 'webmaster'
Expected Output : 'abeemrstw'*/

function letters() {
    let palabra = "imbecil";

    let palabraOrdenada =  palabra.split('').sort().join('');

    console.log(palabraOrdenada);
}

letters();