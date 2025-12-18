<?php
/* ЗАДАНИЕ 1 */
$cols = 10;
$rows = 10;
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
		th {
			background-color: yellow;
			font-weight: bold;
		}
	</style>
</head>
<body>
	<h1>Таблица умножения</h1>
	<table>
	<?php
	/* ЗАДАНИЕ 2, 3 */
	for ($r = 1; $r <= $rows; $r++) {
		echo "<tr>";
		for ($c = 1; $c <= $cols; $c++) {
			$result = $r * $c;
			if ($r === 1 || $c === 1) {
				echo "<th>$result</th>";
			} else {
				echo "<td>$result</td>";
			}
		}
		echo "</tr>";
	}
	?> 
	</table>
</body>
</html>