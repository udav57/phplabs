<?php
declare(strict_types=1);

/**
 * Отрисовывает таблицу умножения
 */
function getTable(int $cols = 10, int $rows = 10, string $color = "yellow"): int {
    static $count = 0;
    $count++;
    echo "<table>";
    for ($r = 1; $r <= $rows; $r++) {
        echo "<tr>";
        for ($c = 1; $c <= $cols; $c++) {
            $result = $r * $c;
            $style = ($r === 1 || $c === 1) ? " style='background-color:$color; font-weight:bold'" : "";
            $tag = ($r === 1 || $c === 1) ? "th" : "td";
            echo "<$tag$style>$result</$tag>";
        }
        echo "</tr>";
    }
    echo "</table>";
    return $count;
}

/**
 * Отрисовывает меню
 */
function getMenu(array $menu, bool $vertical = true): void {
    $style = $vertical ? "menu" : "menu horizontal";
    echo "<ul class='$style'>";
    foreach ($menu as $item) {
        echo "<li><a href='{$item['href']}'>{$item['link']}</a></li>";
    }
    echo "</ul>";
}