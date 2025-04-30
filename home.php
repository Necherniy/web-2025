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
    <div>
        <?php
            $user1_avatar = json_decode(file_get_contents("homeData.json"), true)["users"]["user1"]["avatar_icon"];
            $user_name = json_decode(file_get_contents("homeData.json"), true)["users"]["user1"]["name"];
            echo <<<HTML
                <img src=$user1_avatar alt="avatar_photo_current_user">
                <span class="user_name">$user_name</span>
                <button class="edit_icon"><img src="edit_post_icon.png" alt="Edit_post_icon"></button>
            HTML;
        ?>
    </div>
    <?php
            $post1_photo = json_decode(file_get_contents("homeData.json"), true)["users"]["user1"]["posts"]["post1"]["img1"];
            echo <<<HTML
                <img src=$post1_photo alt="Post_photo_current_user">
            HTML;
    ?>
    <div>
        <?php
            $user1_post_information = json_decode(file_get_contents("homeData.json"), true)["users"]["user1"]["posts"]["post1"]["text"];
            $post_time = date("d.m.Y", json_decode(file_get_contents("homeData.json"), true)["publication_time"]);
            $likes_amount = json_decode(file_get_contents("homeData.json"), true)["users"]["user1"]["posts"]["post1"]["likes"];
            echo <<<HTML
                <button class="likes_btn"><img src="like_icon.png" alt="Like_icon">$likes_amount</button>
                <span class="post_description">$user1_post_information</span>
                <button class="more_btn">ещё</button>
                <span class="post_data">$post_time</span>
            HTML;
        ?>
    </div>
    <div>
        <?php
            $user2_avatar = json_decode(file_get_contents("homeData.json"), true)["users"]["user2"]["avatar_icon"];
            $user_name = json_decode(file_get_contents("homeData.json"), true)["users"]["user2"]["name"];
            echo <<<HTML
                <img class="avatar_img" src=$user2_avatar alt="Avatar_photo_next_user">
                <span class="user_name">$user_name</span>
            HTML;
        ?>
    </div>
    <?php
            $post1_photo = json_decode(file_get_contents("homeData.json"), true)["users"]["user2"]["posts"]["post1"]["img1"];
            echo <<<HTML
                <img src=$post1_photo alt="Post_photo_next_user">
            HTML;
    ?>
</body>
</html>