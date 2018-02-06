<?php header('Content-Type: text/html; charset=utf-8');
    // проверим встречается ли подстрока в строке
    function is_in_str($str, $substr) {
        if(!empty($substr)) {
            $result = strpos ($str, $substr);
            if ($result === FALSE) {
                return false;
            }
            else {
                return true;  
            }
        }
        else {
            return true;
        }
    }
    
    // Печатаем таблицу
    function printTable($row) {
        echo '<tr>';
        echo "<td>{$row["name"]}</td>";
        echo "<td>{$row["author"]}</td>";
        echo "<td>{$row["year"]}</td>";
        echo "<td>{$row["genre"]}</td>"; 
        echo "<td>{$row["isbn"]}</td>";
        echo '</tr>';
    }

    // Печатаем заголовок таблицы
    function tableHeader() {
        echo '<table border="1" bgcolor="#AFEEEE">';    // цвет PaleTurquoise
        echo '<caption>Выводим таблицу из БД<pre></caption>';
        echo '<tr>';
            echo '<th>Название</th><th>Автор</th><th>Год выпускаа</th><th>Жанр</th><th>ISBN</th>';
        echo '</tr>';
    }    

?>