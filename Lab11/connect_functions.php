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
?>