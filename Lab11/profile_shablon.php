<?php 
    include('connect_functions.php');
    function profile_layout(PDO $connection, int $id) {
            $query = connect_to_post($connection, $id);
            $file_data = $query -> fetch(PDO::FETCH_ASSOC);
            $avatar_img = $file_data["avatar_icon"];
            $name_and_surname = $file_data["user_name"] . ' ' . $file_data["user_surname"];
            $description = $file_data["description"];
            $query = connect_to_photos($connection, $id);
            $file_data = $query->fetchall(PDO::FETCH_ASSOC);
            $counter = 0;
            foreach ($file_data as $key => $value) {
                foreach($value as $key_inside => $value_inside){
                    if('photo' == substr($key_inside, 0, 5) && $value_inside != null) {
                        $counter += 1;
                    }
                }
            }
            $posts_word = '';
            if ($counter <= 4 || (($counter % 10 <= 4) && $counter >= 20)) {
                $posts_word = 'Поста';
            } 
            else {
                $posts_word = 'Постов';
            }
            echo <<<HTML
                <div class="profile-content">
                    <div class="profile-content__user-info">
                        <img class="profile-content__avatar-img" src=$avatar_img alt="User_profile_photo">
                        <h2 class="profile-content__user-name">$name_and_surname</h2>
                        <span class="profile-content__user-descr">$description</span>
                        <button class="profile-content__posts-btn"><img class="images-picture" src="profile_photo_icon.png">$counter $posts_word</button>
                    </div>
            HTML;
            echo <<<HTML
                <div class="images">
            HTML;
            foreach ($file_data as $key => $value) {
                foreach($value as $key_inside => $value_inside){
                    if('photo' == substr($key_inside, 0, 5) && $value_inside != null) {
                            echo <<<HTML
                                    <img class="images__profile-posts" src=$value_inside alt="User_photo">
                            HTML;
                    }
                }
            }
            echo <<<HTML
                        </div>
                    </div>
            HTML;
    }
?>