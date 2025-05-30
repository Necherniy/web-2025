const vowels = ['а', 'е', 'ё', 'и', 'о', 'у', 'ы', 'э', 'ю', 'я']

function countVowels(string) {
    let counter = 0
    for (let i = 0; i < string.length; i++) {
        if (vowels.includes(string[i])) {
            counter++
        }
    }
    return counter
}

let counter = countVowels('')
console.log(`Количество гласных = ${counter}`)