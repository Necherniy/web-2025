<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link href="Styles/home_style.css" rel="stylesheet">
    <title>Home</title>
</head>
<body class="body-tag">
    <div class="icons-block">
        <button class="icons-block__icons icons-block__icons_home-icon-margin"><img src="house_icon.png" alt="House_icon"></button>  
        <img class="buttons-block__dot" src="under_dot.png" alt="Under_dot">
        <button class="icons-block__icons"><img src="profile_icon.svg" alt="Porfile_icon"></button>
        <button class="icons-block__icons"><img src="plus_icon.png" alt="Plus_icon"></button>
    </div>
    <div class="content-block">
    <?php
        function connectDatabase(): PDO {
            $dsn = 'mysql:host=localhost;dbname=blog';
            $user = 'root';
            $password = '';
            return new PDO($dsn, $user, $password);
        }
        $connection = connectDatabase();
        include "post_shablon.php";
        $posts = get_posts($connection);
        $posts_ids = $posts->fetchALL(PDO::FETCH_ASSOC);
        foreach($posts_ids as $post => $keys) {
            post_layout($connection, $keys['id'], $keys['post_id']);
        }
    ?>
    </div>
</body>
</html>