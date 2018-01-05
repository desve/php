<?php header('Content-Type: text/html; charset=utf-8');

    echo 'Домашнее задание к лекции 1.4 «Стандартные функции»'.'</br>'.'</br>';
    
    function getWeather($city) {
        // Получаем json файл с погодой
        $API_KEY = bce5cc536bfba4741b691e7818666656;
        $URL = 'api.openweathermap.org/data/2.5/weather?q=';
        $UNITS = 'metric';
        $LANGUAGE = 'ru';
        // Формируем запрос
        $url = "http://"."{$URL}{$city}&lang={$LANGUAGE}&units={$UNITS}&APPID={$API_KEY}";
        // Получаем ответ
        $request = file_get_contents($url);
        return $request;
    }
    
    function lastUpdateTime($fileName, $ACTUAL_TIME) {
        // Проверяем актуальность существующего файла
        echo "В последний раз файл $fileName был изменен: " .date('F d Y H:i:s.', filemtime($fileName)).'</br>';
        echo "Текущее время: " .date('F d Y H:i:s.').'</br>';
        $passedTime = ceil((time() - filemtime($fileName)) / 60);  // округляем до большего числа
        echo "С момента последнего обновления данных прошло: {$passedTime} мин. ";
        echo "Актуальное время- {$ACTUAL_TIME} мин".'</br>';
        if($passedTime > $ACTUAL_TIME) {
            echo 'Существующий файл НЕ актуален.</br>';
            return false;
        }
        else {
            echo 'Существующий файл актуален.';
            return true;
        }
    }
    
    function getActualWeather($city, $fileName) {
        // Получаем актуальную информацию
        $request = getWeather($city);               // получаем json
        $climate=json_decode($request, true);       // декодируем в массив    
        $fileWeather = fopen($fileName, 'w');       // открываем файл для записи
        file_put_contents($fileName, $request);     // записываем
        echo 'Записываем на диск актуальный файл</br>';
        fclose($fileWeather);                       // закрываем файл
        return $climate;
    }
    
    
    // Задаем город
    $city = 'Москва';  
    // Задаем актуальное время для обновления /мин/
    $ACTUAL_TIME = 10;  
    // Проверяем существование файла weather.json;
    $fileName = 'weather.json';
    if (file_exists($fileName)) {
        echo "Файл {$fileName} существует. ";
        $actualTime = lastUpdateTime($fileName, $ACTUAL_TIME);
        if ($actualTime) {
            // Читаем информацию с диска
            echo ' Читаем информацию из существующего файла</br>';
            $fileWeather = fopen($fileName, 'r');
            $request = file_get_contents($fileName);    // получаем json
            fclose($fileWeather);
            $climate=json_decode($request, true);       // декодируем в массив
        }
        else {
            // Удаляем НЕ актуальный файл
            unlink($fileName);
            echo ' Удаляем НЕ актуальный файл. ';
            // Получаем актуальную информацию
            $climate = getActualWeather($city, $fileName);
        }
    } 
    else {
        echo "Файл {$fileName} НЕ существует. ";
        // Получаем актуальную информацию
        $climate = getActualWeather($city, $fileName);
    }
    
    // В итоге получили
    // echo 'Полученный массив<pre>';
    // print_r($climate);
    // echo '</br>';

    // Смотрим, что из нее можно получить
    $temp = $climate['main']['temp'];                       // Температура сейчас
    $pressure = $climate['main']['pressure'];               // Давление
    $humidity = $climate['main']['humidity'];               // Влажность
    $temp_max = $climate['main']['temp_max'];               // Температура max
    $temp_min = $climate['main']['temp_min'];               // Температура min
    $visibility = $climate['visibility'];                   // Видимость
    $speed = $climate['wind']['speed'];                     // Скорость ветра
    $deg = $climate['wind']['deg'];                         // Направление ветра
    $description = $climate['weather'][0]['description'];   // Небо
    $sunrise = date('g:i a', $climate['sys']['sunrise']);   // Восход
    $sunset = date('g:i a', $climate['sys']['sunset']);     // Закат
    $country = $climate['sys']['country'];                  // Страна
    $icon = $climate['weather'][0]['icon'].'.png';          // Красивая картинка
    $today = date("F j, Y, g:i a");                         // Текущее время
    $cityname = $climate['name'];                           // Город
      
?>    
    
<div>
    <h3>Сервис погоды</h3>
    <p><?= "{$cityname} {$country}- {$today}" ?></p>
    <p><?= "<img src='http://openweathermap.org/img/w/{$icon}'" ?></p>
    <ul>
        <li><?= "Температура сейчас: {$temp} &degC" ?></li>
        <li><?= "Давление: {$pressure}" ?></li>
        <li><?= "Влажность: {$humidity}" ?></li>
        <li><?= "Температура max: {$temp_max} &degC" ?></li>
        <li><?= "Температура min: {$temp_min} &degC" ?></li>
        <li><?= "Видимость: {$visibility} " ?></li>
        <li><?= "Скорость ветра: {$speed} м/с" ?></li>
        <li><?= "Направление ветра: {$deg} градусов" ?></li>
        <li><?= "Небо: {$description}" ?></li>
        <li><?= "Восход: {$sunrise}" ?></li>
        <li><?= "Закат: {$sunset}" ?></li>
    </ul>
</div>
