<?php
declare(strict_types=1);

require_once 'config.php';

$link = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
if (!$link) {
    die("Connection failed: " . mysqli_connect_error());
}
mysqli_set_charset($link, DB_CHARSET);

/**
 * ЗАДАНИЕ 1 & 3: Обработка действий (Удаление и Добавление)
 */

// Удаление (GET)
if (isset($_GET['del'])) {
    $id = (int)$_GET['del'];
    $sql = "DELETE FROM msgs WHERE id = $id";
    mysqli_query($link, $sql);
    header("Location: " . $_SERVER['PHP_SELF']);
    exit;
}

// Добавление (POST)
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = mysqli_real_escape_string($link, trim(htmlspecialchars($_POST['name'])));
    $email = mysqli_real_escape_string($link, trim(htmlspecialchars($_POST['email'])));
    $msg = mysqli_real_escape_string($link, trim(htmlspecialchars($_POST['msg'])));

    if ($name && $msg) {
        $sql = "INSERT INTO msgs (name, email, msg) VALUES ('$name', '$email', '$msg')";
        mysqli_query($link, $sql);
        header("Location: " . $_SERVER['PHP_SELF']);
        exit;
    }
}
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Гостевая книга</title>
</head>
<body>
    <h1>Гостевая книга</h1>

    <form action="<?= $_SERVER['PHP_SELF'] ?>" method="post">
        Ваше имя:<br><input type="text" name="name" required><br>
        Ваш E-mail:<br><input type="email" name="email"><br>
        Сообщение:<br><textarea name="msg" cols="50" rows="5" required></textarea><br><br>
        <input type="submit" value="Добавить!">
    </form>

    <?php
    /**
     * ЗАДАНИЕ 2: Вывод сообщений
     */
    $sql = "SELECT id, name, email, msg FROM msgs ORDER BY id DESC";
    $result = mysqli_query($link, $sql);
    
    echo "<p>Всего сообщений: " . mysqli_num_rows($result) . "</p>";

    while ($row = mysqli_fetch_assoc($result)) {
        echo "<hr>";
        echo "<div>";
        echo "<strong>{$row['name']}</strong> ({$row['email']})<br>";
        echo nl2br($row['msg']) . "<br>";
        echo "<a href='?del={$row['id']}' onclick='return confirm(\"Удалить?\")'>Удалить</a>";
        echo "</div>";
    }

    mysqli_close($link);
    ?>
</body>
</html>
