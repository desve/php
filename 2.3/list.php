<?php header('Content-Type: text/html; charset=utf-8');
    echo 'Курс PHP/SQL: back-end разработка и базы данных<br><br>';

    // Cписок всех файлов и каталогов внутри $folder
    $folder = __DIR__."/server";    // директория server
    $files = scandir($folder);
    
    echo "Выбираем файл для тестирования<br><br>";
    foreach($files as $file) {
        // Не считываем текущий и родительский каталог
        if (($file == '.') || ($file == '..')) continue;
        // Передаем в test.php имя выбранного теста
        // Метод GET
        $random = rand(0, 4);  // генерируем случайный вопрос
        echo "<a href='test.php?test={$file}&random=$random'>{$file}</a><br>";
    }
    
?>