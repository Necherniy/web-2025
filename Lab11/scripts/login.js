const parentElem = document.body

const emailInp = document.getElementById('email');
const passwordInp = document.getElementById('password');

emailInp.addEventListener('input', errorFuncEmail(emailInp));
//passwordInp.addEventListener('input', errorFuncPassword(elem));

function errorFuncEmail(elem) {
    //let indexOfDog = elem.indexOf('@');
    console.log(elem);
    // if((elem.includes('@')) && (elem[0] != '@') && (elem.slice(indexOfDog).includes('.')) && (elem[indexOfDog + 1] != '.')) {
    //     console.log("Всё чётко!");
    // }
    // else {
    //     console.log("Проблемка:/");
    // }
}