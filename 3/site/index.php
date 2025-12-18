<?php
  declare(strict_types=1);
  require_once 'inc/lib.inc.php';
  require_once 'inc/data.inc.php';
?>
<!DOCTYPE html>
<html lang="ru">
<head>
  <meta charset="UTF-8">
  <title>Сайт нашей школы</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
  <header>
    <?php include 'inc/top.inc.php'; ?>
    </header>

  <section>
    <h1>Добро пожаловать на наш сайт!</h1>
    <?php include 'inc/index.inc.php'; ?>
    </section>

  <nav>
    <?php include 'inc/menu.inc.php'; ?>
    </nav>

  <footer>
    <?php include 'inc/bottom.inc.php'; ?>
    </footer>
</body>
</html>