<?php header('Content-Type: text/html; charset=utf-8');
    echo 'Курс PHP/SQL: back-end разработка и базы данных<br><br>';
    
    // Подключаем дополнительные модули
    require_once('tools.php');  
    
    // Простенькая проверка на правильность ссылки теста
    if (!isInTests($_GET)) {
        http_response_code(404);
        echo 'Cтраница не найдена!';
        exit(1);
    }

    // Считываем и декодируем полученный тест с server
    $fileName = $_GET['test'];                  // файл с тестом
    // Получаем информацию с сервера
    $continent = strstr($fileName, '.', true);
    $dir = dirname(__FILE__);                   // определяем текущую директорию
    $dirServer = "{$dir}/server";               // путь к серверу 
    $filePath = "{$dirServer}/{$fileName}";     // путь к файлу (тесту)       
    echo "Считываем и декодируем файл {$fileName}</br>"; 
    $info = file_get_contents($filePath);       // получаем json
    $dataFromJson=json_decode($info, true);     // декодируем в массив

    echo "Тест на знание латыни: Животные. Континент - {$continent}</br>";
    // Случайный вопрос
    $question = $dataFromJson[$_GET['random']][1];
    // Задаем форму ввода
    echo "<form method='POST' name='test_2'>";
        echo "Как по латыни называется {$question}?  "; 
        echo "<select name='animal'>";
        echo "<option value='-1'> Сделайте свой выбор";
        foreach ($dataFromJson as $key => $item) {
            echo "<option value={$key}> {$item[0]}";     
        }
        echo "</select>";
        echo "<input type='submit' value='Выбор сделан' name='enter'>";
    echo "</form>";

    // Результат теста
    if (empty($_POST)) {
        $choice = -1;
    }
    else {
        $choice = (int)$_POST['animal'];  // выбор
    }

    if ($choice >= 0) {
        $answer = $dataFromJson[$choice][0];
        echo "Ваш выбор {$answer}<br>";
        echo "{$answer} переводится как ";
        echo "{$dataFromJson[$choice][1]}<br>";
        $answerTrue = $dataFromJson[$_GET['random']][0];
        echo "Правильный ответ {$answerTrue}<br>";
        if ($answer == $answerTrue) {
            $points = enumerator('points.txt');  // записываем успехи
            echo "Ответ правильный. Вы получаете 1 балл<br>";
            echo "У Вас уже {$points} балл(ов)";
        }
        else {
            echo "Ответ Не правильный. Вы получаете 0 баллов";
        }
    }
    else {
        echo "Сделайте свой выбор";
    }
    
?>

    <form method="POST" action="list.php" name="form">
        <br>Переходим к новому тесту?<input type="submit" name="submit" value="Новый тест">
    </form>
    
    <form method="POST" action="input.php" name="form">
        <br>Закончить тестирование?<input type="submit" name="submit" value="Exit">
    </form>

    

    
    








