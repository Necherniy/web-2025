<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>PhpVivod</title>
</head>
<body>
    <form>
        <input type="text" name="equation">
    </form>
    <?php
    $equation = $_GET["equation"];
    function evaluatePostfixExpression($expression) {
        $res = [];
        $operandsAndOperators = explode(' ', $expression);
        foreach ($operandsAndOperators as $operandOrOperator) {
            if (is_numeric($operandOrOperator)) {
                array_push($res, intval($operandOrOperator));
            } 
            else {
                $operand2 = array_pop($res);
                $operand1 = array_pop($res);
                switch ($operandOrOperator) {
                    case "+":
                        array_push($res, $operand1 + $operand2);
                        break;
                    case "-":
                        array_push($res, $operand1 - $operand2);
                        break;
                    case "*":
                        array_push($res, $operand1 * $operand2);
                        break;
                    case "/":
                        if ($operand2 != 0) {
                            array_push($res, intdiv($operand1, $operand2));
                        }
                        else {
                            return "Ошибка Ввода: на ноль делить нельзя!";
                        }
                        break;
                    default:
                        return "Ошибка ввода: " . $operandOrOperator . "!";
                }
            }
        }
        if (sizeof($res) != 1) {
            return "Ошибка ввода: недостаточно операторов!";
        }
        return $res[0];
    }
    $result = evaluatePostfixExpression($equation);
    echo $result;

    ?>
</body>
</html>