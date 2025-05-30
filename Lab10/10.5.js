const users = [
    { id: 1, name: "Alice" },
    { id: 1, name: "ALice2" },
    { id: 2, name: "Bob" },
    { id: 3, name: "Charlie" }
];

function getNames(elem) {
    return elem['name']
}

console.log(users.map(getNames))