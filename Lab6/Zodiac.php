<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Zodiac</title>
</head>
<body>
    <form>
        <input type="text" name="DateInp">
    </form>
    <?php 
    $DateData = $_GET["DateInp"];
    $DateArr = explode(".", $DateData); 
    if ($DateArr[1] == "01"){
        if ($DateArr[0] > 20) {
            echo "Водолей";
        }
        else {
            echo "Козерог";
        }
    }
    elseif ($DateArr[1] == "02") {
        if ($DateArr[0] > 19) {
            echo "Рыбы";
        }
        else {
            echo "Водолей";
        }
    }
    elseif ($DateArr[1] == "03") {
        if ($DateArr[0] > 20) {
            echo "Овен";
        }
        else {
            echo "Рыбы";
        }
    }
    elseif ($DateArr[1] == "04") {
        if ($DateArr[0] > 20) {
            echo "Телец";
        }
        else {
            echo "Овен";
        }
    }
    elseif ($DateArr[1] == "05") {
        if ($DateArr[0] > 21) {
            echo "Близнецы";
        }
        else {
            echo "Телец";
        }
    }
    elseif ($DateArr[1] == "06") {
        if ($DateArr[0] > 21) {
            echo "Рак";
        }
        else {
            echo "Близнецы";
        }
    }
    elseif ($DateArr[1] == "07") {
        if ($DateArr[0] > 22) {
            echo "Лев";
        }
        else {
            echo "Рак";
        }
    }
    elseif ($DateArr[1] == "08") {
        if ($DateArr[0] > 23) {
            echo "Дева";
        }
        else {
            echo "Лев";
        }
    }
    elseif ($DateArr[1] == "09") {
        if ($DateArr[0] > 23) {
            echo "Весы";
        }
        else {
            echo "Дева";
        }
    }
    elseif ($DateArr[1] == "10") {
        if ($DateArr[0] > 23) {
            echo "Скорпион";
        }
        else {
            echo "Весы";
        }
    }
    elseif ($DateArr[1] == "11") {
        if ($DateArr[0] > 22) {
            echo "Стрелец";
        }
        else {
            echo "Скорпион";
        }
    }
    else {
        if($DateArr[0] > 22) {
            echo "Козерог";
        }
        else {
            echo "Стрелец";
        }
    }
    ?>
</body>
</html>