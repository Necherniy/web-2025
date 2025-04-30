const numbers = [2, 5, 8, 10, 3];

function mul(elem) {
    return elem * 3
}

function filt(elem) {
    if (elem > 10) {
        return elem
    }
}

console.log(numbers.map(mul))
console.log((numbers.map(mul)).filter(filt))
