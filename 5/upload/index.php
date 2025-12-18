<?php
declare(strict_types=1);

/**
 * Получает список путей к изображениям в текущей директории.
 * * @param string $pattern Маска поиска (например, *.jpg)
 * @return array Список найденных файлов
 */
function getImages(string $pattern): array 
{
    // glob возвращает массив путей к файлам, соответствующим шаблону
    return glob($pattern);
}
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Галерея загруженных изображений</title>
    <style>
        body {
            font-family: sans-serif;
            background-color: #f4f4f4;
            padding: 20px;
        }
        h1 {
            text-align: center;
            color: #333;
        }
        /* Стилизация сетки галереи */
        .gallery {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(200px, 1fr));
            grid-gap: 20px;
            padding: 20px;
        }
        .gallery-item {
            background: #fff;
            padding: 10px;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0,0,0,0.1);
            transition: transform 0.2s;
            text-align: center;
        }
        .gallery-item:hover {
            transform: scale(1.05);
        }
        .gallery-item img {
            max-width: 100%;
            height: auto;
            border-radius: 4px;
            display: block;
            margin-bottom: 8px;
        }
        .file-name {
            font-size: 12px;
            color: #666;
            word-break: break-all;
        }
        .no-images {
            text-align: center;
            grid-column: 1 / -1;
            padding: 40px;
            color: #999;
        }
        .back-link {
            display: block;
            text-align: center;
            margin-bottom: 20px;
            text-decoration: none;
            color: #007bff;
        }
    </style>
</head>
<body>

    <h1>Галерея изображений</h1>
    <a href="../upload.php" class="back-link">&larr; Вернуться к загрузке</a>

    <div class="gallery">
        <?php
        // Получаем все файлы с расширением .jpg и .jpeg
        // {jpg,jpeg} работает при использовании флага GLOB_BRACE
        $images = glob("*.{jpg,jpeg,JPG,JPEG}", GLOB_BRACE);

        if (!empty($images)):
            foreach ($images as $image): 
        ?>
            <div class="gallery-item">
                <a href="<?= $image ?>" target="_blank">
                    <img src="<?= $image ?>" alt="Изображение">
                </a>
                <div class="file-name"><?= htmlspecialchars($image) ?></div>
            </div>
        <?php 
            endforeach;
        else:
        ?>
            <div class="no-images">
                <p>В каталоге пока нет изображений.</p>
            </div>
        <?php endif; ?>
    </div>

</body>
</html>