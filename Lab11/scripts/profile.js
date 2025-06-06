const home_btn = document.getElementById("home_btn");

home_btn.addEventListener('click', function() {
    window.location.href = 'http://localhost:8001/home.php';
})

const plus_btn = document.getElementById("plus_btn");

plus_btn.addEventListener('click', function() {
    window.location.href = 'http://localhost:8001/addPost.php';
})