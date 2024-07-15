<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $expression = $_POST["expression"] ?? '';
    $input = $_POST["number"] ?? '';
    $operator = $_POST["operator"] ?? '';
    $clear = $_POST["clear"] ?? '';
    $calculate = $_POST["calculate"] ?? '';

    // Handle number and operator inputs
    if (!empty($input) || !empty($operator)) {
        $expression .= $input . $operator;
    }

    // Clear the expression
    if ($clear === 'clear') {
        $expression = '';
    }

    // Evaluate the expression
    if ($calculate === 'calculate') {
        eval('$expression = ' . $expression . ';');
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Simple Calculator</title>
    <link rel="stylesheet" href="chtml.css">
</head>
<body>
    <div class="calculator">
        <form action="calculator.php" method="post">
            <input type="text" name="expression" id="expression" value="<?php echo $expression; ?>" readonly>
            <div class="buttons">
                <button type="submit" name="number" value="7">7</button>
                <button type="submit" name="number" value="8">8</button>
                <button type="submit" name="number" value="9">9</button>
                <button type="submit" name="operator" value="/">÷</button>
                <button type="submit" name="number" value="4">4</button>
                <button type="submit" name="number" value="5">5</button>
                <button type="submit" name="number" value="6">6</button>
                <button type="submit" name="operator" value="*">×</button>
                <button type="submit" name="number" value="1">1</button>
                <button type="submit" name="number" value="2">2</button>
                <button type="submit" name="number" value="3">3</button>
                <button type="submit" name="operator" value="-">-</button>
                <button type="submit" name="number" value="0">0</button>
                <button type="submit" name="number" value=".">.</button>
                <button type="submit" name="operator" value="+">+</button>
                <button type="submit" name="clear" value="clear">C</button>
                <button type="submit" name="calculate" value="calculate">=</button>
            </div>
        </form>
    </div>
</body>
</html>
