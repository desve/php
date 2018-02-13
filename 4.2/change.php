<?php header('Content-Type: text/html; charset=utf-8');
    include('tools.php');
    $id = $_GET["id"];
    $pdo = new PDO("mysql:host=localhost;dbname=4_2", "root", "");
    $query = "SELECT * FROM tasks WHERE id = {$id}";
    foreach ($pdo->query($query) as $row) {
        $string = $row["description"];
    }
?>

    <form method='POST' name='form'>
        <h2>Список дел на сегодня</h2>
        <input name='task' type='text' value=<?php echo $string ?>>
        <input name='add' type='submit' value='Добавить'>
        Сортировать по
        <select name='sort'>
            <option value='date'>Дата добавления</option>
            <option value='status'>Статус</option>
            <option value='description'>Описание</option>
        </select>
        <input name='sort' type='submit' value='Отсортировать'>
    </form>  

<?php header('Content-Type: text/html; charset=utf-8');
    if(!empty($_POST['task'])) {
        $today = date("Y-m-d H:i:s"); 
    	$task = $_POST['task'];
	 	$queryPart1 = "INSERT INTO tasks (id, description, is_done, date_added) ";
	    $queryPart2 = "VALUES (NULL, '{$task}', 0, '{$today}')";   
        $query = $queryPart1.$queryPart2;
        $pdo->query($query);
        $query = "SELECT * FROM tasks";	
        queryToBDAndPrint($query);
    }

    else {
        $query = "SELECT * FROM tasks";	
        queryToBDAndPrint($query);
    }
?>    