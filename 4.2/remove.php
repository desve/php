<?php header('Content-Type: text/html; charset=utf-8');
    include('tools.php');		
    $id = $_GET['id'];
    $pdo = new PDO("mysql:host=localhost;dbname=4_2", "root", "");
    $query = "DELETE FROM tasks WHERE id = {$id}";		
    $pdo->query($query);
    header ('Location: index.php');  // перенаправление на нужную страницу
?>