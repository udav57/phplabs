<?php
declare(strict_types=1);

namespace Classes;

/**
 * Класс, представляющий обычного пользователя системы.
 */
class User {
    /**
     * @param string $name Имя пользователя
     * @param string $login Логин пользователя
     * @param string $password Пароль пользователя (приватное свойство)
     */
    public function __construct(
        public string $name,
        public string $login,
        private string $password
    ) {}


    public function showInfo(): void {
        echo "--- Информация о пользователе ---<br>";
        echo "Имя: {$this->name}<br>";
        echo "Логин: {$this->login}<br>";
    }

    /**
     * Деструктор вызывается при уничтожении объекта.
     */
    public function __destruct() {
        echo "<p style='color: gray;'>Пользователь {$this->login} удален.</p>";
    }
}