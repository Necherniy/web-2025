<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>ConvertNumberToString</title>
</head>
<body>
    <form>
        <input type="text" name="InpNumber">
    </form>
    <?php
        $InNum = $_GET["InpNumber"];
        switch($InNum) {
            case "1":
                echo "Один";
                break;
            case "2":
                echo "Два";
                break;
            case "3":
                echo "Три";
                break;
            case "4":
                echo "Четыре";
                break;
            case "5":
                echo "Пять";
                break;
            case "6":
                echo "Шесть";
                break;
            case "7":
                echo "Семь";
                break;
            case "8":
                echo "Восемь";
                break;
            case "9":
                echo "Девять";
                break;
            case "0":
                echo "Ноль";
            default:
                break;
        }
    ?>
</body>
</html>