<?php
    function connectDatabase(): PDO {
        $dsn = 'mysql:host=localhost:3306;dbname=blog';
        $user = 'root';
        $password = '';
        return new PDO($dsn, $user, $password);
    }
    $connection = connectDatabase();
    $id = 1;
    $query = $connection -> query('
        SELECT *
        FROM post
        WHERE EXISTS
        (SELECT id FROM post WHERE id = 1);
        '
    );
    $string = $query->fetch(PDO::FETCH_ASSOC); 
    print_r($query);
    print_r($string);
?>