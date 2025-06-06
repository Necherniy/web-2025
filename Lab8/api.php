<?php
    include "connect_functions.php";
    function connectDatabase(): PDO {
            $dsn = 'mysql:host=localhost;dbname=blog';
            $user = 'root';
            $password = '';
            return new PDO($dsn, $user, $password);
    }
    function check_data(array $data) {
        foreach($data as $key => $value) {
            if(strlen($value) > 1000) {
                return false;
                $flag++;
            }
            else {
                return true;
            }
        }
    }
    function check_photo(string $photo, $flag) {
        $photos_formats = ['png', 'jpeg', 'jpg', 'svg'];
        $format = explode('.', $photo)[1];
        if(in_array($format, $photos_formats)) {
            return true;
        }
        else {
            return false;
            $flag++;
        }
    }

    function saveDataToDB() {
        $data = json_decode($_POST['main'], true);
        $photos = [];
        $flag = 0;
        if(check_data($data)){
            foreach ($_FILES as $key => $value) {
                $photo = $_FILES[$key]['name'];
                if(check_photo($photo, $flag)) {
                    array_push($photos, $photo);
                    move_uploaded_file($_FILES[$key]['tmp_name'], "images/{$photo}");
                }
                else {
                    throw new ERROR('Неверный формат фотографии!');
                    break;
                }
            }
            if($flag == 0) {
                $connection = connectDatabase();
                insert_post($connection, $data, $photos);
            }
        }
        else {
            throw new ERROR('Длина описание превышает допустимое!');
        }
    }
    $rMethod = $_SERVER['REQUEST_METHOD'];
        if($rMethod == 'POST') {
            saveDataToDB();
        }
?>