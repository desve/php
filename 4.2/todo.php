<?php header('Content-Type: text/html; charset=utf-8');
    include('tools.php');		
    $id = $_GET['id'];
    $pdo = new PDO("mysql:host=localhost;dbname=4_2", "root", "");					
    $query = "UPDATE tasks SET is_done = 1 WHERE id = {$id}";
    $pdo->query($query);
    header ('Location: index.php');  
?>