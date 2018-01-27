<?php
if (empty($_COOKIE['my_cookie'])) {
    setcookie('my_cookie', 'value');
} else {
    echo $_COOKIE['my_cookie'];
}
