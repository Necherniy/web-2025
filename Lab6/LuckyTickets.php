<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>LuckyTickets</title>
</head>
<body>
    <form>
        <input type="text" name="FirstNumberInp">
        <input type="text" name="SecondNumberInp">
        <input type="submit">
    </form>
    <?php
    $FirstNumberNotParsed = $_GET["FirstNumberInp"]; 
    $SecondNumberNotParsed = $_GET["SecondNumberInp"];
    $CycleNumber = $FirstNumberNotParsed;
    while ($CycleNumber <= $SecondNumberNotParsed) {
        $FirstCycleNumber = $CycleNumber[0] + $CycleNumber[1] + $CycleNumber[2];
        $SecondCycleNumber = $CycleNumber[3] + $CycleNumber[4] + $CycleNumber[5]; 
        if ($FirstCycleNumber == $SecondCycleNumber) {
            echo  nl2br("$CycleNumber\n");
        }
        $CycleNumber = $CycleNumber + 1;
    }
    
    ?>
</body>
</html>