<?php
session_start();
if (!empty($_SESSION['is_admin'])) {
    echo 'Вы админ!<br/>';
}
echo session_save_path();

