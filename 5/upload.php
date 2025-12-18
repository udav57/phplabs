<?php
declare(strict_types=1);
?>
<!DOCTYPE html>
<html lang="ru">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Загрузка файла на сервер</title>
</head>
 <body>
  <div>
   <?php
   /**
    * ЗАДАНИЕ
    */
   if (($_SERVER['REQUEST_METHOD'] ?? 'GET') === 'POST' && isset($_FILES['fupload'])) {
       $file = $_FILES['fupload'];

       // 1. Извлекаем данные о файле
       $name = $file['name'];
       $size = $file['size'];
       $tmpName = $file['tmp_name'];
       $error = $file['error'];

       // 2. Выводим информацию о файле
       if ($error === UPLOAD_ERR_OK) {
           // Используем mime_content_type для надежной проверки типа
           $type = mime_content_type($tmpName);

           echo "<h3>Информация о файле:</h3>";
           echo "<ul>";
           echo "<li>Имя файла: " . htmlspecialchars($name) . "</li>";
           echo "<li>Размер: $size байт</li>";
           echo "<li>Временное имя: $tmpName</li>";
           echo "<li>Тип (MIME): $type</li>";
           echo "<li>Код ошибки: $error</li>";
           echo "</ul>";

           // 3. Проверка типа и перемещение
           if ($type === 'image/jpeg') {
               $dir = 'upload/';
               
               // Генерируем имя файла как MD5-хеш от оригинального имени
               $ext = pathinfo($name, PATHINFO_EXTENSION);
               $newName = md5($name . time()) . "." . $ext;

               if (move_uploaded_file($tmpName, $dir . $newName)) {
                   echo "<p style='color: green;'>Файл успешно загружен как: $newName</p>";
               } else {
                   echo "<p style='color: red;'>Ошибка при перемещении файла.</p>";
               }
           } else {
               echo "<p style='color: orange;'>Загрузка прервана: разрешены только файлы типа image/jpeg.</p>";
           }
       } elseif ($error === UPLOAD_ERR_NO_FILE) {
           echo "<p style='color: red;'>Файл не был выбран.</p>";
       } else {
           echo "<p style='color: red;'>Произошла ошибка при загрузке. Код: $error</p>";
       }
   }
   ?>
  </div>

  <form enctype="multipart/form-data" action="<?= htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="post">
    <p>
      <input type="hidden" name="MAX_FILE_SIZE" value="10485760">
      <input type="file" name="fupload"><br><br>
      <button type="submit">Загрузить</button>
    </p>
   </form>
 </body>
</html>