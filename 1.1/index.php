Домашнее задание к лекции 1.1 «Введение в PHP»

<?php header("Content-Type: text/html; charset=utf-8");
  $userName = 'Владимир';
  $userAge = '52';
  $userMail = '2901243@mail.ru';
  $userCity = 'Kazan';
  $userAbout = 'I like PHP';
?>
<div>
 <h2>Страница пользователя <?= $userName ?></h2>
 <p>Имя <strong><?= $userName ?></p>
 <p>Адрес электронной почты <strong><?= $userMail ?></p>
 <p>Город <strong><?= $userCity ?></p>
 <p>О себе <strong><?= $userAbout ?></p>
</div>
