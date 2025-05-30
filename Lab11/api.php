<?php
     function connectDatabase(): PDO {
        $dsn = 'mysql:host=localhost:3306;dbname=blog';
        $user = 'root';
        $password = '';
        return new PDO($dsn, $user, $password);
    }
    $connection = connectDatabase();
    $method = $_SERVER['REQUEST_METHOD'];
    if($method = 'POST') {
        $user_name = $_POST["user_name"];
        $avatar_icon = $_POST["avatar_icon"];
        $user_surname = $_POST["user_surname"];
        $email = $_POST["email"];
        $query = $connection -> query("
                INSERT INTO 
                    post (
                        user_name,
                        avatar_icon,
                        user_surname,
                        email
                    )
                VALUES(
                     '$user_name',
                     '$avatar_icon',
                     '$user_surname',
                     '$email'
                );"
            );
    }
?>