<!DOCTYPE html>
<html lang="en">
<head>
    <script src="scripts/profile.js" defer></script>
    <meta charset="UTF-8">
    <link href="Styles/profile_style.css" rel="stylesheet">
    <title>Profile</title>
</head>
<body class="body-tag">
<div class="buttons-block">
        <button id="home_btn" class="icons-block__icons"><img src="house_icon.png" alt="House_icon"></button>  
        <button class="icons-block__icons icons-block__icons_profile-icon-margin"><img src="profile_icon.svg" alt="Porfile_icon"></button>
        <img class="icons-block__dot" src="under_dot.png" alt="Under_dot">
        <button id="plus_btn" class="icons-block__icons"><img src="plus_icon.png" alt="Plus_icon"></button>
</div>
<div class="content-block">
    <?php
        include "profile_shablon.php";
        function connectDatabase(): PDO {
            $dsn = 'mysql:host=localhost:3306;dbname=blog';
            $user = 'root';
            $password = '';
            return new PDO($dsn, $user, $password);
        }
        $connection = connectDatabase();
        trim($_GET["id"]);
        $id = $_GET["id"];
        if(isset($_GET["id"]) && filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT) && ($connection -> query("Select * FROM post WHERE EXISTS(SELECT * FROM post WHERE id = '$id');") -> rowCount() != 0)) {
            profile_layout($connection, $id);
        }
        else {
            header("Location: http://localhost:8001/home.php");
            exit;
        }
    ?>
</div>
</body>
</html>