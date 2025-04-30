<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link href="home_style.css" rel="stylesheet">
    <title>Home</title>
</head>
<body>
    <div>
        <button class="main_icons"><img src="house_icon.png" alt="House_icon"></button>  
        <img src="under_dot.png" alt="Under_dot">
        <button class="main_icons"><img src="profile_icon.png" alt="Porfile_icon"></button>
        <button class="main_icons"><img src="plus_icon.png" alt="Plus_icon"></button>
    </div>
    <?php
        include "post_shablon.php";
        $users = 
        [
            $user1 = "user1",
            $user2 = "user2"
        ];
        foreach ($users as $key => $value) {
            post_layout($value);
        }
    ?>
</body>
</html>