<?php
declare(strict_types=1);

/*
ЗАДАНИЕ 1
*/
$now = time();
$birthday = mktime(0, 0, 0, 11, 27, 2005); 

$dateInfo = getdate();
$hour = $dateInfo['hours'];

/**
 * Определяет приветствие в зависимости от текущего часа.
 * * @param int $hour Текущий час (0-23)
 * @return string Текст приветствия
 */
function getWelcomeMessage(int $hour): string 
{
    if ($hour >= 0 && $hour < 6) {
        return 'Доброй ночи';
    } elseif ($hour >= 6 && $hour < 12) {
        return 'Доброе утро';
    } elseif ($hour >= 12 && $hour < 18) {
        return 'Добрый день';
    } elseif ($hour >= 18 && $hour <= 23) {
        return 'Добрый вечер';
    } else {
        return 'Доброй ночи';
    }
}

/**
 * Вычисляет разницу между двумя временными метками и возвращает строку.
 * * @param int $target Метка времени в будущем
 * @param int $current Текущая метка времени
 * @return string Отформатированная строка с разницей
 */
function getCountdown(int $target, int $current): string 
{
    $diff = $target - $current;
    
    if ($diff < 0) {
        return "Ваш день рождения уже прошел в этом году!";
    }

    $days = floor($diff / 86400);
    $hours = floor(($diff % 86400) / 3600);
    $minutes = floor(($diff % 3600) / 60);
    $seconds = $diff % 60;

    return "{$days} дней, {$hours} часов, {$minutes} минут и {$seconds} секунд";
}
?>
<!DOCTYPE html>
<html lang="ru">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Использование функций даты и времени</title>
</head>
<body>
	<h1>Использование функций даты и времени</h1>
	<?php
	/*
	ЗАДАНИЕ 2
	*/

	$welcome = getWelcomeMessage($hour);
	echo "<p>$welcome</p>";


	$formatter = new IntlDateFormatter(
	    'ru_RU',
	    IntlDateFormatter::LONG,
	    IntlDateFormatter::MEDIUM,
	    'Europe/Moscow',
	    IntlDateFormatter::GREGORIAN,
	    "Сегодня d MMMM yyyy 'года', EEEE HH:mm:ss"
	);
	
	echo "<p>" . $formatter->format($now) . "</p>";

	echo "<p>До моего дня рождения осталось: " . getCountdown($birthday, $now) . "</p>";
	?>
</body>
</html>