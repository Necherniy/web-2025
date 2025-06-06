const parentElem = document.body

const emailInp = document.getElementById('email');
const passwordInp = document.getElementById('password');
const email_label = document.getElementById('email_label');

emailInp.addEventListener('input', elem => errorFuncEmail(emailInp));
passwordInp.addEventListener('input', elem => errorFuncPassword(passwordInp));

function errorFuncEmail(elem) {
    inp_val = elem.value;
    let indexOfDog = inp_val.indexOf('@');
    if((inp_val.includes('@')) && (inp_val[0] != '@') && (inp_val.slice(indexOfDog).includes('.')) && (inp_val[indexOfDog + 1] != '.') && (inp_val.indexOf('.') != (inp_val.length - 1))) {
        emailInp.classList.remove("input_err");
        email_label.classList.remove("label_input_err");
    }
    else {
        emailInp.classList.add("input_err");
        email_label.classList.add("label_input_err");
    }
}

function errorFuncPassword(elem) {
    inp_val = elem.value;

    if(inp_val.length >= 8) {
        passwordInp.classList.remove("input_err");
    }
    else {
        passwordInp.classList.add("input_err");
    }
    
}