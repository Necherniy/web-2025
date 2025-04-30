<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>JsonTest</title>
</head>
<body>
    <?php
        $jsonFile = file_get_contents('FirstTestZad.json');
        $jsondData = json_decode($jsonFile, true);
        
        echo $jsondData['photo']
    ?>
</body>
</html>