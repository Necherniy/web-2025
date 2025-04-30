<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>LeapYear</title>
</head>
<body>
    <form>
        <input type="text" name="YearInp">
    </form>
    <?php
        $Year = $_GET["YearInp"];
        if ((($Year % 4 == 0) && ($Year % 100 != 0)) || ($Year % 400 == 0)) {
            echo "Yes";
        } 
        else {
            echo "No";
        }
    ?>

</body>
</html>