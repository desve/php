<?php header('Content-Type: text/html; charset=utf-8');

    echo 'Домашнее задание к лекции 1.4 «Стандартные функции»'.'</br>'.'</br>';
    
    $API_KEY = bce5cc536bfba4741b691e7818666656;
    $URL = 'api.openweathermap.org/data/2.5/weather?q=';
    $UNITS = 'metric';
    
    $city = 'Москва';  // Задвем город
    $language = 'en';
    // Формируем запрос
    $url = "http://"."{$URL}{$city}&lang={$language}&units={$UNITS}&APPID={$API_KEY}";
    // Получаем ответ
    $request = file_get_contents($url);
    $climate=json_decode($request);
    // Получаем информацию
    echo 'Полученный массив<pre>';
    print_r($climate);
    echo '</br>';

    // Смотрим: что из нее можно получить
    $temp = $climate -> main -> temp;          // Температура сейчас
    $pressure = $climate -> main -> pressure;  // Давление
    $humidity = $climate -> main -> humidity;  // Влажность
    $temp_max = $climate -> main -> temp_max;  // Температура max
    $temp_min = $climate -> main -> temp_min;  // Температура min
    $visibility = $climate -> visibility;      // Видимость
    $speed = $climate -> wind -> speed;        // Скорость ветра
    $deg = $climate -> wind -> deg;            // Направление ветра
    $clouds = $climate -> clouds -> all;       // Облачность
    $sunrise = $climate -> sys -> sunrise;     // Восход
    $sunset = $climate -> sys -> sunset;       // Закат
    $country = $climate -> sys -> country;     // Страна
    $icon = $climate -> weather[0] -> icon.".png";   // Красивая картинка
    $today = date("F j, Y, g:i a");            // Текущее время
    $cityname = $climate -> name;              // Город
    
    // Выводим
    echo "{$cityname} {$country}- {$today}</br>";
    echo "<img src='http://openweathermap.org/img/w/{$icon}'</br></br>";
    echo "Температура сейчас: {$temp} &degC</br>";
    echo "Давление: {$pressure}</br>";
    echo "Влажность: {$humidity}</br>";
    echo "Температура max: {$temp_max} &degC</br>";
    echo "Температура min: {$temp_min} &degC</br>";
    echo "Видимость: {$visibility} м</br>";
    echo "Скорость ветра: {$speed} м/с</br>";
    echo "Направление ветра: {$deg} градусов</br>";
    echo "Облачность: {$clouds}</br>";
    echo "Восход: ".date('g:i a', $sunrise).'</br>';
    echo "Закат: ".date('g:i a', $sunset).'</br>';
    
?>