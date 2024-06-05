<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Multipurpose Calculator</title>
</head>
<body>
    <h1>Multipurpose Calculator</h1>
    <form method="POST" action="">
        <label for="num1">Number 1:</label>
        <input type="number" id="num1" name="num1" step="any" required><br>

        <label for="num2">Number 2:</label>
        <input type="number" id="num2" name="num2" step="any"><br>

        <label for="operation">Operation:</label>
        <select id="operation" name="operation" required>
            <option value="add">Addition</option>
            <option value="subtract">Subtraction</option>
            <option value="multiply">Multiplication</option>
            <option value="divide">Division</option>
        </select><br>

        <input type="submit" value="Calculate">
    </form>

    <?php
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $num1 = isset($_POST['num1']) ? floatval($_POST['num1']) : 0;
        $num2 = isset($_POST['num2']) ? floatval($_POST['num2']) : 0;
        $operation = $_POST['operation'];

        $result = '';
        switch ($operation) {
            case 'add':
                $result = $num1 + $num2;
                break;
            case 'subtract':
                $result = $num1 - $num2;
                break;
            case 'multiply':
                $result = $num1 * $num2;
                break;
            case 'divide':
                if ($num2 != 0) {
                    $result = $num1 / $num2;
                } else {
                    $result = 'Error: Division by zero';
                }
                break;
            case 'exponent':
                $result = pow($num1, $num2);
                break;
            case 'percentage':
                if ($num2 != 0) {
                    $result = ($num1 / $num2) * 100;
                    $result .= '%';
                } else {
                    $result = 'Error: Division by zero';
                }
                break;
            case 'sqrt':
                if ($num1 >= 0) {
                    $result = sqrt($num1);
                } else {
                    $result = 'Error: Negative number';
                }
                break;
            case 'log':
                if ($num1 > 0) {
                    $result = log($num1);
                } else {
                    $result = 'Error: Non-positive number';
                }
                break;
            default:
                $result = 'Invalid operation selected';
        }

        echo "<h2>Result: $result</h2>";
    }
    ?>
</body>
</html>
