function isPrimeNumber(Number) {
    let ComparedNumber = 0
    let Limit = 0
    let isPrime = true
    if (typeof(Number) == 'number'){
        Limit = 1
        ComparedNumber = Number
    }
    else if (typeof(Number) == 'object'){
        Limit = Number.length
    }
    else {
        console.log('Ошибка ввода')
        Limit = 0
    }
    
    for (let i = 0; i < Limit; i++) {
        isPrime = true
        if (typeof(Number) == 'object'){
            ComparedNumber = Number[i]
        }
        if (typeof(ComparedNumber) != 'number') {
            console.log('Ошибка ввода')
            continue
        }
        for (let j = 2; j < ComparedNumber && isPrime; j++) {
            if (ComparedNumber % j == 0) {
                isPrime = false
            }
        }//Вынести в отдельную функцию
        if (isPrime) {
            console.log(`Результат: ${ComparedNumber} простое число`)
        }
        else {
            console.log(`Результат: ${ComparedNumber} не простое число`)
        }
    } 
} 
isPrimeNumber([12, '', 11])
isPrimeNumber(1)