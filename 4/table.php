<?php
declare(strict_types=1);

require_once 'inc/lib.inc.php';
require_once 'inc/data.inc.php';

$cols = (int)(filter_input(INPUT_POST, 'cols') ?: 10);
$rows = (int)(filter_input(INPUT_POST, 'rows') ?: 10);
$color = filter_input(INPUT_POST, 'color') ?: 'yellow';
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Таблица умножения</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header>
        <?php include 'inc/top.inc.php'; ?>
    </header>

    <section>
        <h1>Таблица умножения</h1>
        
        <form action="<?= $_SERVER['PHP_SELF'] ?? '' ?>" method="post">
            <label>Кол-во столбцов: </label>
            <input name='cols' type='text' value="<?= $cols ?>" size="3">
            <label>Кол-во строк: </label>
            <input name='rows' type='text' value="<?= $rows ?>" size="3">
            <label>Цвет: </label>
            <input name='color' type='text' value="<?= $color ?>" size="10">
            <input type='submit' value='Создать'>
        </form>
        <br>

        <?php
            /* Вызов функции из lib.inc.php */
            getTable($cols, $rows, $color);
        ?>
        </section>

    <nav>
        <?php include 'inc/menu.inc.php'; ?>
    </nav>

    <footer>
        <?php include 'inc/bottom.inc.php'; ?>
    </footer>
</body>
</html>