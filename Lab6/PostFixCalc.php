<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>PhpVivod</title>
</head>
<body>
    <?php
        foreach ($_POST as $key => $value) {
            echo "{$key} = {$value} </br>";
        }
    ?>
</body>
</html>