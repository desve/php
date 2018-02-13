<form method="POST" name="form">
    <h2>Список дел на сегодня</h2>
    <input name='task' type='text' value='' placeholder='Описание задания'>
    <input name='add' type='submit' value='Добавить'>
    Сортировать по
    <select size="1" name="sort">
        <option disabled>Что сортируем?</option>
        <option value="date_added" selected>По дате</option>
        <option value="is_done">По статусу</option>
        <option value="description">По описанию</option>
    </select>
    <input type="submit" value="Сортировать">
</form>

<?php header('Content-Type: text/html; charset=utf-8');
    include('tools.php');          

    $key = $_POST['sort'];
    if (isset($key)) {
        $query = "SELECT * FROM tasks ORDER BY {$key} ASC";
        queryToBDAndPrint($query);
    }
    else {
        if(!empty($_POST['task'])) {
            $today = date("Y-m-d H:i:s"); 
            var_dump($today);
        	$task = $_POST['task'];
    	 	$queryPart1 = "INSERT INTO tasks (id, description, is_done, date_added) ";
    	    $queryPart2 = "VALUES (NULL, '{$task}', 0, '{$today}');";   
            $query = $queryPart1.$queryPart2;
            $query = "SELECT * FROM tasks";	
            queryToBDAndPrint($query);
        }

        else {
            $query = "SELECT * FROM tasks";	
            queryToBDAndPrint($query);
        }
    }

?>