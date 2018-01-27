<?php
 require_once 'core/functions.php';

 if (!isAuthorised()) {
     redirect('login');
 }
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Главная админ панели</title>
</head>
<body>
    Добро пожаловать, <?= getAuthorisedUserData()['username'] ?>
    <a href="logout.php">Выход</a>
</body>
</html>

