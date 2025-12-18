<?php
declare(strict_types=1);

// автозагрузка классов
spl_autoload_register(function ($className) {
    
    $filePath = str_replace('Classes\\', 'classes/', $className) . '.php';

    if (file_exists($filePath)) {
        require_once $filePath;
    }
});

use Classes\User;
use Classes\SuperUser;

echo "<h1>Система управления пользователями</h1>";


echo "<h2>Список сотрудников (User):</h2>";

$user1 = new User("Александр Волков", "wolf_prime", "v0lk_pass_99");
$user2 = new User("Елена Соколова", "falcon_eye", "secure_bird_77");
$user3 = new User("Дмитрий Морозов", "frost_dm", "winter_is_coming");

$user1->showInfo();
$user2->showInfo();
$user3->showInfo();

echo "<hr>";


echo "<h2>Доступ администратора (SuperUser):</h2>";

$user = new SuperUser("Марина Власова", "super_marina", "alpha_admin_2025", "Администратор");

$user->showInfo();

echo "<p style='margin-top: 20px; font-style: italic;'>Скрипт выполнен успешно. Память очищается...</p>";