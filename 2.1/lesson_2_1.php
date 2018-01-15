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
    
    // Получаем требуемый для работы массив
    $jsonPhonesBook = json_encode($phonesBook, true);
    echo "Получаем массив для работы {$jsonPhonesBook}</br>";
    echo 'Который необходимо представить в виде HTML-таблицы</br>';
    
    // Декодируем json обратно
    $dataFromJson =  json_decode($jsonPhonesBook, true);
    echo 'Выводим массив<pre>';
    print_r($dataFromJson);
    echo '</br>';
    
?>


Выводим таблицу из JSON-файла в виде HTML-таблицы
<html>
  <head>
    <title>Домашнее задание к лекции 2.1 Установка и настройка веб-сервера</title>
  </head>>
    <body>
      <?php foreach($dataFromJson as $key => $item) {?> 
          <?php echo "Запись {$key}"?>
          <ul>
              <li><?php echo "Имя {$item["firstName"]}"?></li>
              <li><?php echo "Фамилия {$item["lastName"]}"?></li>
              <li><?php echo "Адрес {$item["address"]}"?></li>
              <li><?php echo "Телефон {$item["phoneNumber"]}"?></li>
          </ul>
          <?php }?>
    </body> 
</html>


