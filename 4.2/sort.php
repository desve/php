<?php header('Content-Type: text/html; charset=utf-8');
    function sortDD($key) {
        echo "$key";
        include('tools.php');		
        $pdo = new PDO("mysql:host=localhost;dbname=4_2", "root", "");						
        $query = "SELECT * FROM tasks ORDER BY {$key} ASC";
        $pdo->query($query);
        header ('Location: index.php'); 
    }
?>