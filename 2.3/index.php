<?php header('Content-Type: text/html; charset=utf-8');
    echo 'Курс PHP/SQL: back-end разработка и базы данных<br><br>';

    // Выполняем редирект
    //$URL = "https://php-sql-v-ladimir.c9users.io";
    //$URL = "http://university.netology.ru/u/desiyatov/2.3";
    $goToURL = 'list.php';
    header("Location: {$goToURL}");
    
?>