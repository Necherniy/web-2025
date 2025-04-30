<?php
    include('connect_functions.php');
    function post_layout(PDO $connection, string $id, string $post_id) {
            $query = connect_to_post($connection, $id);
            $file_data = $query->fetch(PDO::FETCH_ASSOC);
            $user_avatar = $file_data["avatar_icon"];
            $user_name = $file_data["user_name"] . ' ' . $file_data["user_surname"];
            $query = connect_to_photos($connection, $id);
            $file_data = $query->fetch(PDO::FETCH_ASSOC);
            $post_photo = $file_data["photo1"];
            $query = connect_to_posts_info($connection, $id, $post_id);
            $file_data = $query->fetch(PDO::FETCH_ASSOC);
            $user_post_information = $file_data["post_description"];
            $post_time = $file_data['publication_date'];
            $likes_amount = $file_data["likes_amount"];
            echo <<<HTML
                <div class="user-data-wrapper">
                    <div class="user-data">
                        <img class="user-data__avatar-img" src=$user_avatar alt="avatar_photo_current_user">
                        <span class="user-data__user-name">$user_name</span>
                    </div>
                    <button class="edit-post-icon"><img src="edit_post_icon.png" alt="Edit_post_icon"></button>
                </div>
                <img class="post-photo" src=$post_photo alt="Post_photo_current_user">
                <div class="post-info">
                    <button class="post-info__likes-btn"><img class="post-info__likes-btn__img" src="like_icon.png" alt="Like_icon">$likes_amount</button>
             HTML;
            if($user_post_information != null) {
                echo <<<HTML
                        <span class="post-info__post-description">$user_post_information</span>
                        <button class="post-info__more-btn">ещё</button>
                HTML;
            }
            echo <<<HTML
                <span class="post-info__post-date">$post_time</span>   
                </div>
            HTML;
    }
?>