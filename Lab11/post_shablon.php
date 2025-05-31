<?php
    include('connect_functions.php');
    function post_layout(PDO $connection, int $id, int $post_id) {
            $query = connect_to_post($connection, $id);
            $file_data = $query->fetch(PDO::FETCH_ASSOC);
            $user_avatar = $file_data["avatar_icon"];
            $user_name = $file_data["user_name"] . ' ' . $file_data["user_surname"];
            $query = connect_to_posts_info($connection, $id, $post_id);
            $file_data = $query->fetch(PDO::FETCH_ASSOC);
            $user_post_information = $file_data["post_description"];
            $post_time = $file_data['publication_date'];
            $likes_amount = $file_data["likes_amount"];
            $slider_left_id = "sliderLeft" . $id . '.' . $post_id;
            $slider_right_id = "sliderRight" . $id . '.' . $post_id;
            $amount_id = "amount" . $id . '.' . $post_id;
            $post = "post" . $id . '.' . $post_id;
            $more_btn = "moreBtn" . $id . '.' . $post_id;
            $query = connect_to_photos_with_post_id($connection, $id, $post_id);
            $file_data = $query->fetchall(PDO::FETCH_ASSOC);
            $photo_counter = 0;
            foreach ($file_data as $key => $value) {
                foreach($value as $key_inside => $value_inside) {
                    if('photo' == substr($key_inside, 0, 5) && $value_inside != null) {
                        $photo_counter += 1;
                }
                }
            }
            echo <<<HTML
                <div class="post-block">
                <div class="user-data-wrapper">
                    <div class="user-data">
                        <img class="user-data__avatar-img" src=$user_avatar alt="avatar_photo_current_user">
                        <span class="user-data__user-name">$user_name</span>
                    </div>
                    <button class="edit-post-icon"><img src="edit_post_icon.png" alt="Edit_post_icon"></button>
                </div>
                <div id=$post class="post-photo-block">
            HTML;
            foreach ($file_data as $key => $value) {
                $elem_index = 0;
                foreach($value as $key_inside => $value_inside) {
                    if('photo' == substr($key_inside, 0, 5) && $value_inside != null) {
                        $elem_index += 1;
                        $photo_id = 'photo' . $id . '.' . $post_id . ':' . $elem_index;
                        if ($elem_index <= 1)
                            echo <<<HTML
                                    <img id=$photo_id class="post-photo" src=$value_inside alt="Post_photo_current_user">
                            HTML;
                        else {
                            echo <<<HTML
                                    <img id=$photo_id class="post-photo post-photo_transparent" src=$value_inside alt="Post_photo_current_user">
                            HTML;
                        }
                }
                }
            }
            echo <<<HTML
                <div class="slider-button-block">
                        <button id=$slider_left_id class="slider-button-block__button slider-button-block__button_disabled"><img src="sliderButtonLeft.svg"></button>
                        <button id=$slider_right_id class="slider-button-block__button"><img src="sliderButtonRight.svg"></button>
                    </div>
                <div class="photos-amount-block">
                        <p id=$amount_id class="photos-amount-block__amount">1/$photo_counter</p>
                    </div>
                </div>
                <div class="post-info">
                    <button class="post-info__likes-btn"><img class="post-info__likes-btn__img" src="like_icon.png" alt="Like_icon">$likes_amount</button>
             HTML;
            if($user_post_information != null) {
                echo <<<HTML
                        <span class="post-info__post-description">$user_post_information</span>
                HTML;
                if(strlen($user_post_information) > 115)    
                echo <<<HTML
                        <button id=$more_btn class="post-info__more-btn">ещё</button>
                HTML;
            }
            echo <<<HTML
                <span class="post-info__post-date">$post_time</span>   
                </div>
                </div>
            HTML;
    }
?>