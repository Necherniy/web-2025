const inputData = [1, '1', 'привет', 'hello']

function uniqueElements(arrayWithData) {
    let objWithUniqueElements = {};
    let counter = 0;
    for (let elem of arrayWithData) {
        let comparedElem = elem.toString();
        for (let elem2 of arrayWithData) {
            let comparedElem2 = elem2.toString();
            if(comparedElem == comparedElem2) {
                counter++;
            }
        }
        objWithUniqueElements[comparedElem] = counter;
        counter = 0;
    }
    return objWithUniqueElements
}

console.log(uniqueElements(inputData))