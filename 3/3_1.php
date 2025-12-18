<?php
declare(strict_types=1);

/*
ЗАДАНИЕ 1
*/
$login = ' User ';
$password = 'megaP@ssw0rd';
$name = 'иван';
$email = 'ivan@petrov.ru';
$code = '<?=$login?>';

/**
 * Проверяет пароль на сложность.
 * Пароль должен содержать минимум одну заглавную латинскую букву, 
 * одну строчную, одну цифру и иметь длину не менее 8 символов.
 *
 * @param string $password Пароль для проверки
 * @return bool True, если пароль сложный, иначе False
 */
function isComplexPassword(string $password): bool 
{
    $length = mb_strlen($password) >= 8;
    $hasUpper = preg_match('/[A-Z]/', $password);
    $hasLower = preg_match('/[a-z]/', $password);
    $hasDigit = preg_match('/[0-9]/', $password);

    return $length && $hasUpper && $hasLower && $hasDigit;
}
?>
<!doctype html>
<html lang="ru">
<head>
	<meta charset="utf-8">
	<title>Использование функций обработки строк</title>
</head>
<body>

<?php
	/*
	ЗАДАНИЕ 2
	*/

	$login = mb_strtolower(trim($login));
	echo "Логин: $login <br>";

	echo "Пароль сложный: ";
	var_dump(isComplexPassword($password));
	echo "<br>";

	$name = mb_convert_case($name, MB_CASE_TITLE, "UTF-8");
	echo "Имя: $name <br>";

	echo "Email корректен: ";
	var_dump(filter_var($email, FILTER_VALIDATE_EMAIL) !== false);
	echo "<br>";

	echo "Код: " . htmlspecialchars($code) . "<br>";
?>
</body>
</html>