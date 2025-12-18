<?php
declare(strict_types=1);

/**
 * Очищает и фильтрует данные, полученные из суперглобального массива $_COOKIE.
 * * @param string $name Имя куки.
 * @return string Отфильтрованное значение или пустая строка, если куки не существует.
 */
function getSafeCookieValue(string $name): string {
    if (isset($_COOKIE[$name])) {
        return htmlspecialchars(trim($_COOKIE[$name]));
    }
    return "";
}

/*
ЗАДАНИЕ 1
*/

$visitCount = (int)getSafeCookieValue('visitCount');
$visitCount++;

$lastVisit = getSafeCookieValue('lastVisit');

$expire = time() + 86400;
setcookie('visitCount', (string)$visitCount, $expire);
setcookie('lastVisit', date('d-m-Y H:i:s'), $expire);

?>
<!DOCTYPE html>
<html lang="ru">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Последний визит</title>
    <style>
        body { font-family: sans-serif; line-height: 1.6; padding: 20px; }
        .info { background: #e7f3ff; padding: 15px; border-radius: 5px; display: inline-block; }
    </style>
</head>
<body>

<h1>Последний визит</h1>

<div class="info">
<?php
/*
ЗАДАНИЕ 2
*/
if ($visitCount === 1) {
    echo "<h2>Добро пожаловать!</h2>";
} else {
    echo "<p>Вы зашли на страницу <strong>$visitCount</strong> раз.</p>";
    if (!empty($lastVisit)) {
        echo "<p>Последнее посещение: <strong>$lastVisit</strong></p>";
    }
}
?>
</div>

<p><a href="<?= $_SERVER['PHP_SELF'] ?>">Обновить страницу</a></p>

</body>
</html>