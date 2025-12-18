<?php
/**
 * Функция map для обработки массива
 * @param array $array Исходный массив
 * @param callable $callback Функция обратного вызова
 * @return array Результирующий массив
 */
function map(array $array, callable $callback): array 
{
    $result = [];
    foreach ($array as $item) {
        $result[] = $callback($item);
    }
    return $result;
}

$numbers = [2, 4, 6, 8];

$squaredNumbers = map($numbers, fn($n) => $n * $n);

echo "Исходный массив: " . implode(", ", $numbers) . "<br>";
echo "Результат (квадраты): " . implode(", ", $squaredNumbers) . "<br>";

echo "Проверка первого элемента (4): ";
var_dump($squaredNumbers[0] === 4);
echo "<br>";

echo "Проверка второго элемента (16): ";
var_dump($squaredNumbers[1] === 16);
?>