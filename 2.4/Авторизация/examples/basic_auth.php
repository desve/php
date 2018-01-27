<?php
define('USER_ADMIN', 'admin');
define('USER_PASS', 'pass');
if (
    empty($_SERVER['PHP_AUTH_USER']) || empty($_SERVER['PHP_AUTH_PW'])
    || $_SERVER['PHP_AUTH_USER'] != USER_ADMIN || $_SERVER['PHP_AUTH_PW'] != USER_PASS
) {
    header('WWW-Authenticate: Basic realm="my_realm"');
    die;
}

echo 'Добро пожаловать в админку, ' . USER_ADMIN;

