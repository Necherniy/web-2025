<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>FactNumb</title>
</head>
<body>
    <form>
        <input type="text" name="FactNumbInp">
    </form>
    <?php
        function FactCalc($FactVal, $ResVal):int {
            if ($FactVal != 1) {
                $ResVal = $ResVal * $FactVal;
                $FactVal= $FactVal - 1;
                $ResVal = FactCalc($FactVal, $ResVal);    
            }
            return $ResVal;
        }
        $FactVal = $_GET["FactNumbInp"];
        $ResVal = 1;
        echo FactCalc($FactVal, $ResVal);
    ?>
</body>
</html>