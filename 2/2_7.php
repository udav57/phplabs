<?php
/**
 * ЗАДАНИЕ 4 (PHPDoc)
 * Отрисовывает таблицу умножения и возвращает количество вызовов функции
 * * @param int $cols Количество столбцов
 * @param int $rows Количество строк
 * @param string $color Цвет заголовков
 * @return int Общее количество вызовов функции
 */
/* ЗАДАНИЕ 1, 2, 3, 4 */
function getTable(int $cols = 10, int $rows = 10, string $color = "yellow"): int 
{
    static $count = 0;
    $count++;

    echo "<table>";
    for ($r = 1; $r <= $rows; $r++) {
        echo "<tr>";
        for ($c = 1; $c <= $cols; $c++) {
            $result = $r * $c;
            if ($r === 1 || $c === 1) {
                echo "<th style='background-color:{$color}'>$result</th>";
            } else {
                echo "<td>$result</td>";
            }
        }
        echo "</tr>";
    }
    echo "</table><br>";

    return $count;
}
?>
<!DOCTYPE html>
<html lang="ru">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Таблица умножения</title>
	<style>
		table {
			border: 2px solid black;
			border-collapse: collapse;
		}
		th, td {
			padding: 10px;
			border: 1px solid black;
			text-align: center;
		}
	</style>
</head>
<body> 
	<h1>Таблица умножения</h1>
	<?php
	/* ЗАДАНИЕ 3, 5 */
	getTable(); 
	getTable(5); 
	$totalCalls = getTable(8, 8, "lightblue"); 

	echo "<p>Всего вызовов функции: $totalCalls</p>";
	?> 
</body>
</html>