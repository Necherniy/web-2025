<?php
    function connect_to_post(PDO $connection, int $id) {
        $query = $connection -> query("
                SELECT 
                    * 
                FROM 
                    post
                WHERE
                    id = '$id';"
        );
        return $query; 
    }

    function connect_to_posts_info(PDO $connection, int $id, int $post_id) {
        $query = $connection -> query("
                SELECT
                    * 
                FROM 
                    posts_info_table
                WHERE
                    id = '$id' AND post_id = '$post_id';"
            );
        return $query;
    }

    function connect_to_photos(PDO $connection, int $id) {
        $query = $connection -> query("
                SELECT 
                    * 
                FROM 
                    photos_table
                WHERE
                    id = '$id'"
            );
        return $query;
    }
?>