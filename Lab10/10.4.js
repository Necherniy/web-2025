const obj1 = {a: 1, b: 2}
const obj2 = {b: 3, c: 4}

function mergeObjects(obj1, obj2) {
    let mergedObj = {}
    for (let key in obj1) {
        mergedObj[key] = obj1[key]
    }
    for (let key in obj2) {
        mergedObj[key] = obj2[key]
    }
    return mergedObj
}
console.log(mergeObjects(obj1, obj2))
