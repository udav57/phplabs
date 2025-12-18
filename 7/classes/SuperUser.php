<?php
declare(strict_types=1);

namespace Classes;

/**
 * Класс, представляющий пользователя с расширенными правами.
 */
class SuperUser extends User {
    /**
     * @param string $name Имя
     * @param string $login Логин
     * @param string $password Пароль
     * @param string $role Роль в системе
     */
    public function __construct(
        string $name,
        string $login,
        string $password,
        public string $role
    ) {
        // Вызов конструктора родительского класса
        parent::__construct($name, $login, $password);
    }


    public function showInfo(): void {
        parent::showInfo();
        echo "Роль: {$this->role}<br>";
    }
}