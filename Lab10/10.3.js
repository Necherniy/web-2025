const inputData = [1, '1', 'привет', 'hello']

function uniqueElements(arrayWithData) {
    let objWithUniqueElements = {}
    let counter = 0
    let len = arrayWithData.length
    for (let i = 0; i < len; i++) {// попробовать использовать пробег по элементам массива через for each например
        comparedElem = '' + arrayWithData[i]//найти метод 
        counter = 0
        for (let j = 0; j < len; j++) {
            elem = '' + arrayWithData[j]
            if (elem == comparedElem) {
                counter++
            }
        }
        objWithUniqueElements[comparedElem] = counter
    }
    return objWithUniqueElements
}

console.log(uniqueElements(inputData))