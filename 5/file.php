<?php
declare(strict_types=1);

/**
 * ЗАДАНИЕ 1
 */

// Устанавливаем константу для хранения пути к файлу
const GUEST_BOOK_STORAGE = 'db/guestbook.txt';

/**
 * Обрабатывает и очищает входящую строку.
 *
 * @param string $data Необработанная строка из POST
 * @return string Очищенная строка
 */
function sanitizeInput(string $data): string 
{
    return htmlspecialchars(strip_tags(trim($data)));
}

// Проверяем, была ли отправлена форма методом POST
if (($_SERVER['REQUEST_METHOD'] ?? 'GET') === 'POST') {
    $fname = $_POST['fname'] ?? '';
    $lname = $_POST['lname'] ?? '';

    // Проверка на заполненность полей
    if (!empty($fname) && !empty($lname)) {
        
        // Фильтрация данных
        $safeFname = sanitizeInput($fname);
        $safeLname = sanitizeInput($lname);
        
        // Формируем строку (одна строка — один пользователь)
        $entry = "$safeFname $safeLname\n";
        
        // Записываем в файл (флаг FILE_APPEND позволяет дописывать данные в конец)
        file_put_contents(GUEST_BOOK_STORAGE, $entry, FILE_APPEND | LOCK_EX);
        
        // Перезапрос страницы для предотвращения повторной отправки формы (PRG pattern)
        header("Location: " . $_SERVER['PHP_SELF']);
        exit;
    }
}
?>
<!DOCTYPE html>
<html lang="ru">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Работа с файлами</title>
</head>
<body>

<h1>Заполните форму</h1>

<form method="post" action="<?= htmlspecialchars($_SERVER['PHP_SELF']) ?>">
    Имя: <input type="text" name="fname" required><br>
    Фамилия: <input type="text" name="lname" required><br>
    <br>
    <input type="submit" value="Отправить!">
</form>

<hr>

<h2>Список пользователей</h2>

<?php
/**
 * ЗАДАНИЕ 2
 */

if (file_exists(GUEST_BOOK_STORAGE)) {
    // Получаем содержимое файла в виде массива (каждая строка — элемент массива)
    // FILE_IGNORE_NEW_LINES убирает символы переноса строк
    // FILE_SKIP_EMPTY_LINES пропускает пустые строки
    $users = file(GUEST_BOOK_STORAGE, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
    
    if ($users) {
        echo "<ol>";
        foreach ($users as $user) {
            echo "<li>$user</li>";
        }
        echo "</ol>";
        
        // Выводим размер файла
        $size = filesize(GUEST_BOOK_STORAGE);
        echo "<p><em>Размер файла данных: $size байт.</em></p>";
    } else {
        echo "<p>Список пока пуст.</p>";
    }
} else {
    echo "<p>Файл данных еще не создан.</p>";
}
?>

</body>
</html>