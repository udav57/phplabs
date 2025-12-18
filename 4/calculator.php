<?php
declare(strict_types=1);

/*
ЗАДАНИЕ 1
*/

$result = null;
$num1 = '';
$num2 = '';
$operator = '+';

if (($_SERVER['REQUEST_METHOD'] ?? 'GET') === 'POST') {
    
    $num1 = filter_input(INPUT_POST, 'num1', FILTER_VALIDATE_FLOAT);
    $num2 = filter_input(INPUT_POST, 'num2', FILTER_VALIDATE_FLOAT);
    $operator = filter_input(INPUT_POST, 'operator', FILTER_SANITIZE_SPECIAL_CHARS);

    if ($num1 === false || $num1 === null || $num2 === false || $num2 === null) {
        $result = 'Ошибка: введите корректные числа!';
    } else {
        /**
         * Выполняет математическую операцию над двумя числами.
         * * @param float $n1 Первое число
         * @param float $n2 Второе число
         * @param string $op Оператор (+, -, *, /)
         * @return float|string Результат вычисления или сообщение об ошибке
         */
        function calculate(float $n1, float $n2, string $op) {
            switch ($op) {
                case '+': return $n1 + $n2;
                case '-': return $n1 - $n2;
                case '*': return $n1 * $n2;
                case '/': 
                    return ($n2 === 0.0) ? 'На ноль делить нельзя!' : $n1 / $n2;
                default: return 'Некорректный оператор!';
            }
        }

        $result = calculate((float)$num1, (float)$num2, (string)$operator);
    }
}
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Калькулятор</title>
</head>
<body>

    <h1>Простой калькулятор</h1>

    <?php
    /*
    ЗАДАНИЕ 2
    */
    if ($result !== null): ?>
        <div style="background: #eee; padding: 10px; margin-bottom: 20px;">
            <strong>Результат: <?= $result ?></strong>
        </div>
    <?php endif; ?>

    <form method="post">
        <p>
            <label for="num1">Число 1</label><br>
            <input type="text" name="num1" id="num1" value="<?= htmlspecialchars((string)$num1) ?>" required>
        </p>

        <p>
            <label for="operator">Оператор</label><br>
            <select name="operator" id="operator">
                <?php foreach(['+', '-', '*', '/'] as $op): ?>
                    <option value="<?= $op ?>" <?= $operator === $op ? 'selected' : '' ?>><?= $op ?></option>
                <?php endforeach; ?>
            </select>
        </p>

        <p>
            <label for="num2">Число 2</label><br>
            <input type="text" name="num2" id="num2" value="<?= htmlspecialchars((string)$num2) ?>" required>
        </p>

        <button type="submit">Считать!</button>
    </form>

</body>
</html>