<form method="POST" name="form">
    <h2>Библиотека успешного человека</h2> 
    <input name="isbn" placeholder="ISBN" type="text" pattern="[0-9-]{3,17}$" value="">
    <input name="name" placeholder="Название книги" type="text" pattern="[a-zA-Zа-яА-Я0-9 -]{3,20}$" value="">
    <input name="author" placeholder="Автор книги" type="text" pattern="[a-zA-Zа-яА-Я0-9 -]{3,20}$" value="">
    <input type="submit" name="submit" value="Применить"> 
</form>
    
<?php header('Content-Type: text/html; charset=utf-8');

    // Подключаем модули
    require_once('tools.php');  
    require_once('config.php');  
    
	//Соединяемся с базой данных используя наши доступы:
	$link = mysqli_connect($host, $user, $password, $db_name);
	mysqli_query($link, "SET NAMES 'utf8'");    	// устанавливаем кодировку
	
	//Формируем тестовый запрос
	$query = "SELECT * FROM books";
	//Делаем запрос к БД, результат запроса пишем в $result:
	$result = mysqli_query($link, $query) or die(mysqli_error($link));
	
	// Выводим результат
	$isbn = $_POST['isbn'];
	$name = $_POST['name'];
	$author = $_POST['author'];
    tableHeader();                      // заголовок таблицы
    if ($isbn === '' && $name === '' && $author === '') {
        while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
            printTable($row);           // таблица
        } 
    }
    else {     
        while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) { 
            if (is_in_str($row["isbn"], $isbn) && 
                is_in_str($row["name"], $name) && 
                is_in_str($row["author"], $author)) {
                    printTable($row);   // таблица    
            }
            echo '<br>';
        }
    }
	echo '</table>'; 
?>