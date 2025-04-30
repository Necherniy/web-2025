function genPas(len) {
    let retStr = ''
    if (len < 4) {
        console.log('Пароль должен содержать минимум 4 символа!')
        len = 0
    }
    len = len -4
    retStr = retStr + String.fromCharCode(Math.round(Math.random() * 25 + 97))
    retStr = retStr + String.fromCharCode(Math.round(Math.random() * 25 + 65))
    retStr = retStr + String.fromCharCode(Math.round(Math.random() * 9 + 48))
    retStr = retStr + String.fromCharCode(Math.round(Math.random() * 14 + 33))
    for (let i = 0; i < len; i++) {
        retStr = retStr + String.fromCharCode((Math.round(Math.random() * 93 + 33)))
    }
    return retStr
}

// function genSym(num) {
//     switch (num) {
//         case 0: return String.fromCharCode(Math.round(Math.random() * 25 + 97))
//         case 1: return String.fromCharCode(Math.round(Math.random() * 25 + 65))
//         case 2: return String.fromCharCode(Math.round(Math.random() * 14 + 33))
//         case 3: return String.fromCharCode(Math.round(Math.random() * 6 + 58))
//         case 4: return String.fromCharCode(Math.round(Math.random() * 5 + 91))
//         case 5: return String.fromCharCode(Math.round(Math.random() * 3 + 123))
//         case 6: return String.fromCharCode(Math.round(Math.random() * 9 + 48))
//     }
// }

console.log(genPas(10))