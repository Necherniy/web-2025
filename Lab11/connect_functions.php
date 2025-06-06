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

    function get_posts(PDO $connection) {
        $query = $connection -> query("
            SELECT 
                id, post_id
            FROM
                posts_info_table;
        ");
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

    function selectElemsFromTable(PDO $connection, string $table, string $elem) {
        $query = $connection -> query("
                SELECT $elem
                FROM $table
            ");
        return $query;
    }

    function selectElemsFromTableWithWhere(PDO $connection, string $table, string $elem, string $where_elem, string $where_elem_value) {
        $query = $connection -> query("
                SELECT $elem
                FROM $table
                WHERE '$where_elem' = '$where_elem_value';");
        return $query;
    }

    function connect_to_photos_with_post_id(PDO $connection, int $id, int $post_id) {
        $query = $connection -> query("
                SELECT 
                    * 
                FROM 
                    photos_table
                WHERE
                    id = '$id' AND post_id = '$post_id'"
            );
        return $query;
    }

    function insert_post(PDO $connection, array $data, array $photos) {
        $data_prepared = '';
        $photos_prepared = '';
        $keys_prepared = '';
        $cnt = 0;
        foreach($data as $key => $value) {
            $prepared_value = $connection -> quote($value);
            $prepared_key = $connection -> quote($key);
            if($cnt == 0) {
                $data_prepared = $prepared_value;
                $cnt++;
            }
            else {
                $data_prepared .= ', ' . $prepared_value;
            }
        }
        $cnt = 0;
        $photos_cnt = 0;
        foreach($photos as $key => $value) {
            $prepared_value = $connection -> quote('images/' . $value);
            $prepared_key = $connection -> quote($key);
            $photos_cnt++;
            if($cnt == 0) {
                $photos_prepared = $prepared_value;
                $cnt++;
            }
            else {
                $photos_prepared .= ', ' . $prepared_value;
            }
        }
        $query = $connection -> query("
                SELECT
                    post_id 
                FROM 
                    posts_info_table
                WHERE
                    id = 1;"
            );
        $max_post_id = 0;
        $cnt = 0;
        foreach($query as $key => $post_id) {
            if($cnt = 0) {
                $max_post_id = $post_id[0];
            }
            else {
                if($post_id[0] > $max_post_id) {
                    $max_post_id = $post_id[0];
                }
            }
        }
        $max_post_id++;
        date_default_timezone_set('Europe/Moscow');
        $publication_date = date('H:i:s d-m-Y');
        $publication_date = $connection -> quote($publication_date);
        $query = $connection -> query("
                INSERT INTO posts_info_table
                (id, post_id, post_description, likes_amount, publication_date)
                VALUES (1, $max_post_id, $data_prepared, 0, $publication_date);
            ");
        $imgs = '';
        $cnt = 0;
        for($i = 1; $i < ($photos_cnt + 1); $i ++) {
            if($cnt == 0) {
                $imgs = 'photo' . $i;
                $cnt++;
            }
            else {
                $imgs .= ', ' . 'photo' . $i; 
            }
        };
        $query = $connection -> query("
            INSERT INTO photos_table
            (id, post_id, $imgs)
            VALUES (1, $max_post_id, $photos_prepared);
        "); 
    }
?>