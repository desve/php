<?php header('Content-Type: text/html; charset=utf-8');
    echo 'Курс PHP/SQL: back-end разработка и базы данных<br><br>';
    echo 'Спасибо, что согласились пройти наш замечатедльный тест!<br>';
    echo 'Для начала давайте его сгенерируем<br><br>'; 
?>

<form method="POST" action="makeTests.php" name="form">
    Генератор тестов 
    <input type="submit" name="submit" value="Генерировать!">
</form>

