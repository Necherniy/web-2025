<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Zodiac++</title>
</head>
<body>
    <form>
        <input type="text" name="DateInp">
    </form>
    <?php
        $dateData = $_GET["DateInp"];
        $notAllowedSymbols = ['.', ' '];
        $date = [];
        $buf = '';
        $counter = 0;
        for ($i = 0; ($i < strlen($dateData)) && ($counter <= 2); $i++) {
            if(!in_array($dateData[$i], $notAllowedSymbols)) {
                $buf .= $dateData[$i];
            }
            else {
                if($buf != '') {
                    array_push($date, strtolower($buf));
                    $buf = '';
                    $counter++;
                }
            }
        }
        if($counter <= 2) {
            array_push($date, $buf);
        }
        print_r($date);
        $day = '';
        $month = '';
        $year = '';
        $temp1 = $date[0];
        $temp2 = $date[1];
        $temp3 = $date[2];
        
    ?>
</body>
</html>