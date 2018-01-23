<?php header('Content-Type: text/html; charset=utf-8');
    echo 'Курс PHP/SQL: back-end разработка и базы данных<br><br>';
?>

<form method="POST" action="certificate.php" name="form">

    Для прохождения завершения тестирования и получения сертификата 
    <br>введите Ваше имя: 
    <input name="userName" type="text" pattern="[a-zA-Zа-яА-Я]{3,10}$" value="">
    (имя пользователя: 3-10 символов, только буквы, без пробелов)
    <br><br>Ваш пол: 
    М <input name="sex" type="radio" value="Мужской">
    Ж <input name="sex" type="radio" value="Женский"><br><br>
    <input type="submit" name="submit" value="Отправить">
    
</form>
