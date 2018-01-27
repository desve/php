<?php
// или в php.ini
ini_set('session.gc_maxlifetime', 1440);

session_start();
// После того как пользователь ввел корректные логин и пароль
$_SESSION['is_admin'] = true;


