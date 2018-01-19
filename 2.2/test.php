<?php header('Content-Type: text/html; charset=utf-8');

    echo time( );
    echo "</br>";

    // Читаем информацию из list.php  
    $fileListName = 'list.php';         // имя файла с названиями тестов
    $tests = file($fileListName);       // получаем массив с названиями тестов
    $countTest = count($tests);         // количество тестов
    echo "Загружено на сервер тестов - {$countTest}<br>";
    foreach ($tests as $key => $test) {
        echo "- {$test}</br>";
    }
    echo "</br>";
?>

<form method="GET" name="form">
    Выберете номер теста <input type="number" name="testСhoice" min="0" max="<?= $countTest ?>" value="0">
    <input type="submit" value="Пройти тест">
</form>    


<?php

    if ($_GET["testСhoice"]) {
        // Считываем и декодируем полученный тест с server
        $fileName = trim($tests[$_GET["testСhoice"]-1]);            // файл с тестом
        $continent = strstr($tests[$_GET["testСhoice"]-1], '.', true);
        $dir = dirname(__FILE__);                                   // определяем текущую директорию
        $dirServer = "{$dir}/server";                               // путь к серверу 
        $filePath = "{$dirServer}/{$fileName}";                     // путь к файлу (тесту)
        $fileInfo = fopen($filePath, 'r');                  // открываем файл
        $info = file_get_contents($filePath);               // получаем json
        fclose($fileInfo);                                  // закрываем файл
        $dataFromJson=json_decode($info, true);             // декодируем в массив
        echo "Считываем и декодируем файл {$fileName}</br>"; 

        $questionAnimal = $dataFromJson[$questionNumber][1];
        // echo '<pre>';
        // print_r($dataFromJson);
        // echo '</br>';
    
        echo "Тест номер {$_GET["testСhoice"]}: Животные. Континент - {$continent}</br>";
        // Генерируем случайный вопрос
        $questionN = rand(1, count($dataFromJson)) - 1;
        //$questionNumber = $questionN;
        $questionNumber = $_GET["testСhoice"];
        $questionAnimal = $dataFromJson[$questionNumber][1];
        // Задаем форму ввода
        echo "<form method='POST' name='test'>";
        echo "Как по латыни называется {$questionAnimal}?  "; 
        echo "<select name='animal'>";
            echo "<option value=0> Сделайте свой выбор";
            foreach ($dataFromJson as $key => $item) {
                echo "<option value={$key}+1> {$item[0]}";     
            }
            echo "</select>";
        echo "<input type='submit' value='Выбор сделан'>";
        echo "</form>";
        
        //echo print_r($_POST);
        
        if($_POST['animal']) {
            // Находим и выводим правильный ответ
            $answer = intval($_POST['animal']);
            $latin = $dataFromJson[$answer][0];
            echo "Ваш выбор {$latin}</br>";
            $russian = $dataFromJson[$answer][1];
            echo "{$latin} переводится как {$russian}</br>";  
            foreach ($dataFromJson as $data) {
                if ($data[1] === $questionAnimal) {
                    echo "Правильный ответ {$data[0]}";
                }
            }
        }
        else {
            echo "Сделайте свой выбор";  
        }
    }
    else {
        echo "Выберете номер теста";
    }

?>
    
    








