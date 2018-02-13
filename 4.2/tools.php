<?php header('Content-Type: text/html; charset=utf-8');
    
    // Печатаем таблицу
    function printTable($row) {
        $id = $row['id'];
        echo '<tr>';
        echo "<td>{$row["description"]}</td>";
        echo "<td>{$row["date_added"]}</td>";
        if ($row["is_done"] == 1) {
            echo "<td>";
                echo "<font color='Blue'>Выполнено</font>";
            echo "</td>";
        }
        else {
            echo "<td>";
                echo "<font color='red'>НЕ выполнено</font>";
            echo "</td>";
        }
        echo "<td>";
            echo "<a href='change.php?id={$id}'>Изменить ";
            echo "<a href='todo.php?id={$id}'>Выполнить ";
            echo "<a href='remove.php?id={$id}'>Удалить</a>";
        echo "</td>";
        echo "</tr>";
    }
    
    // Печатаем заголовок таблицы
    function tableHeader() {
        echo '<table border="1" bgcolor="AquaMarine">'; 
        echo '<caption>Выводим таблицу из БД<pre></caption>';
        echo '<tr>';
            echo '<th>Описание задачи</th><th>Дата добавления</th><th>Статус</th><th>Выдерете действие</th>';
        echo '</tr>';
    }  
    
    // Запрос к БД
    function queryToBDAndPrint($query) {
        $pdo = new PDO("mysql:host=localhost;dbname=4_2", "root", "");						
        tableHeader(); 	
        foreach ($pdo->query($query) as $row) {
            printTable($row);     
        }
    }

?>