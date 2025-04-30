<?php 
    function profile_layout(string $id) {
            $file_data = json_decode(file_get_contents("profileData.json"), true)["users"];
            $avatar_img = $file_data[$id]["avatar_icon"];
            $name_and_surname = $file_data[$id]["name_and_surname"];
            $description = $file_data[$id]["description"];
            $posts_amount = $file_data[$id]["posts_amount"];
            $imgs = $file_data[$id]["imgs"];
            echo <<<HTML
                <div>
                    <img class="avatar_img" src=$avatar_img alt="User_profile_photo">
                    <h2 class="user_name">$name_and_surname</h2>
                    <span class="user_descr">$description</span>
                    <button class="posts_btn"><img src="profile_photo_icon.png">$posts_amount поста</button>
                </div>
            HTML;
            foreach ($imgs as $key => $value) {
                echo <<<HTML
                    <img class="profile_posts" src=$value alt="User_photo">  
                HTML;
            }
    }
?>