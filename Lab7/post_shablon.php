<?php
    function post_layout(string $user) {
            $file_data = json_decode(file_get_contents("homeData.json"), true)["users"];
            $user_avatar = $file_data[$user]["avatar_icon"];
            $user_name = $file_data[$user]["name"];
            $post_photo = $file_data[$user]["posts"]["post1"]["img1"];
            $user_post_information = $file_data[$user]["posts"]["post1"]["text"];
            $post_time = date("d.m.Y", $file_data[$user]["posts"]["post1"]["publication_time"]);
            $likes_amount = $file_data[$user]["posts"]["post1"]["likes"];
            echo <<<HTML
                <div>
                    <img src=$user_avatar alt="avatar_photo_current_user">
                    <span class="user_name">$user_name</span>
                    <button class="main_icons"><img src="edit_post_icon.png" alt="Edit_post_icon"></button>
                </div>
                <img src=$post_photo alt="Post_photo_current_user">
                <div>
                    <button class="likes_btn"><img src="like_icon.png" alt="Like_icon">$likes_amount</button>
                    <span class="post_description">$user_post_information</span>
                    <button class="more_btn">ещё</button>
                    <span class="post_data">$post_time</span>   
                </div>
            HTML;
    }
?>