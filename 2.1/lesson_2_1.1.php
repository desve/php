<?php header('Content-Type: text/html; charset=utf-8');

    echo 'Домашнее задание к лекции 2.1 Установка и настройка веб-сервера</br></br>';
    
    echo 'Задаем массив телефонных номеров</br></br>';
    $phonesBook = [
        [
            "firstName"=> "Иван",
            "lastName"=> "Иванов",
            "address"=> "г.Москва, ул. Иванова, 2",
            "phoneNumber"=> "495 123-1234"
         ], 
         [
            "firstName"=> "Петр",
            "lastName"=> "Петров",
            "address"=> "г.Санкт Петербург, ул. Петрова, 3",
            "phoneNumber"=> "812 123-1234"
         ],
         [
            "firstName"=> "Сидор",
            "lastName"=> "Сидоров",
            "address"=> "г.Нижний Новгород, ул. Сидорова, 3",
            "phoneNumber"=> "812 123-1234"
         ],
    ]; 
    echo 'Выводим массив<pre>';
    print_r($phonesBook);
    echo '</br>';
    
    // Создаем отдельный файл со строкой содержащей json в текстовом виде
    // Создаем json
    $jsonPhonesBook = json_encode($phonesBook, JSON_UNESCAPED_UNICODE);
    // Записываем в файл info.json
    $fileName = 'info.json';
    echo "Записываем в файл {$fileName}</br>";
    $fileInfo = fopen($fileName, 'w');                  // открываем файл для записи
    file_put_contents($fileName, $jsonPhonesBook);      // записываем
    fclose($fileInfo);                                  // закрываем файл
    
    // Считываем и декодируем полученный файл
    $fileInfo = fopen($fileName, 'r');                  // открываем файл
    $request = file_get_contents($fileName);            // получаем json
    fclose($fileInfo);                                  // закрываем файл
    $dataFromJson=json_decode($request, true);          // декодируем в массив
    echo "Считываем и декодируем файл {$fileName}</br></br></br>";
      
    // Выводим таблицу из JSON-файла в виде HTML-таблицы
    $rows = count($dataFromJson);                   // количество строк, tr
    $cols = count($dataFromJson[0]) + 1;            // количество столбцов, td
    echo '<table border="1" bgcolor="#AFEEEE">';    // цвет PaleTurquoise
    echo '<caption>Выводим таблицу из JSON-файла в виде HTML-таблицы<pre></caption>';
    echo '<tr>';
      echo '<th>Имя</th><th>Фамилия</th><th>Адрес</th><th>Телефон</th>';
    echo '</tr>';
    
    for ($tr = 0; $tr < $rows; $tr++) { 
        echo '<tr>';
        foreach ($dataFromJson[$tr] as $item) {   
            echo '<td>'.$item.'</td>';
        }
        echo '</tr>';
    }
    echo '</table>';  

?>