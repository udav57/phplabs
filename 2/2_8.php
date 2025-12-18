<?php

$leftMenu = [
    ['link' => 'Домой', 'href' => 'index.php'],
    ['link' => 'О нас', 'href' => 'about.php'],
    ['link' => 'Контакты', 'href' => 'contact.php'],
    ['link' => 'Таблица умножения', 'href' => 'table.php'],
    ['link' => 'Калькулятор', 'href' => 'calc.php']
];

/**
 * 
 * 
 * @param array $menu 
 * @param bool $vertical 
 */
/* ЗАДАНИЕ 1, 2 */
function getMenu(array $menu, bool $vertical = true) 
{
    $style = $vertical ? "menu" : "menu horizontal";
    echo "<ul class='$style'>";
    foreach ($menu as $item) {
        echo "<li><a href='{$item['href']}'>{$item['link']}</a></li>";
    }
    echo "</ul>";
}
?>
<!DOCTYPE html>
<html lang="ru">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Меню</title>
	<style>
		.menu {
			list-style-type: none;
			margin: 0;	
			padding: 0;
		}

		.horizontal li {
			display: inline;
			margin-right: 15px;
		}
	</style>
</head>
<body>
	<h1>Меню</h1>

	<h3>Вертикальное меню</h3>
	<?php
	/* ЗАДАНИЕ 3 */
	getMenu($leftMenu); 
	?> 

	<hr>

	<h3>Горизонтальное меню</h3>
	<?php
	/* ЗАДАНИЕ 4 */
	getMenu($leftMenu, false); 
	?> 
</body>
</html>