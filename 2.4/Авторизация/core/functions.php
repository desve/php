<?php
session_start();

//define('USER_ADMIN', 'admin');
//define('USER_PASS', 'pass');

/**
 * Проверяет, является ли запрос POST запросом
 * @return bool
 */
function isPost() {
    return $_SERVER['REQUEST_METHOD'] == 'POST';
}

/**
 * Получает POST параметр $name
 * @param $name
 * @return null
 */
function getParamPost($name) {
    return isset($_POST[$name]) ? $_POST[$name] : null;
}

/**
 * Реализует механизм входа в систему
 * @param $login
 * @param $password
 * @return bool
 */
function login($login, $password)
{
    $user = getUser($login);
    if (!empty($user) && $user['login'] == $login && $user['password'] == $password) {
        $_SESSION['user'] = $user;
        return true;
    }
    return false;
}

/**
 * Проверяет, авторизован ли пользователь
 * @return bool
 */
function isAuthorised()
{
    if (!empty($_SESSION['user'])) {
        return true;
    }
    return false;
}

/**
 * Возвращает данне авторизованного пользователя
 * @return null
 */
function getAuthorisedUserData()
{
    return isset($_SESSION['user']) ? $_SESSION['user'] : null;
}

/**
 * Реализует механизм выхода из системы
 */
function logout()
{
    session_destroy();
}

/**
 * Получает данные пользователя по логину
 * @param $login
 */
function getUser($login)
{
    $users = getUsers();
    foreach ($users as $user) {
        if ($user['login'] == $login) {
            return $user;
        }
    }
    return null;
}

/**
 *  Получает список всех пользователей
 */
function getUsers()
{
    $fileData = file_get_contents(__DIR__ . '/../data/users.json');

    $users = @json_decode($fileData, true);

    if (!$users) {
        return [];
    }
    return $users;
}

function redirect($page)
{
    header("Location: $page.php");
    die;
}