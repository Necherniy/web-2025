const nums = {a: 1, b: 2, c: 3}

function mapObject(obj, callback) {
    let changedObj = {}
    for (let key in obj) {
        changedObj[key] = callback(obj[key]) 
    }
    return changedObj
}

function inc(elem) {
    return elem + 1
}

console.log(mapObject(nums, x => x * 2))
console.log(mapObject(nums, inc))
