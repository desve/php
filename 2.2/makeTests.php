<?php header('Content-Type: text/html; charset=utf-8');
    echo 'Курс PHP/SQL: back-end разработка и базы данных<br><br>';

    // Задаем массивы тестов
    $animalsContinent = [
        'Africa' => [
            ['Panthera leo', 'Лев'],
            ['Hyaenidae', 'Гиена'],
            ['Canis aureus', 'Шакал'],
            ['Elephantidae', 'Слон'],
            ['Ceratotherium simum', 'Белый носорог'],
        ], 
        'Eurasia' => [
            ['Cervus elaphus', 'Благородный олень'],
            ['Leporidae', 'Заяц'],
            ['Ursus arctos', 'Бурый медведь'],
            ['Lynx', 'Рысь'],
            ['Gulo gulo', 'Росомаха'],
        ], 
        'America' => [
            ['Mammuthus columbi', 'Мамонт Колумба'],
            ['Nasua narica', 'Коати'],
            ['Antilocapra americana', 'Вилорог'],
            ['Pecari tajacu', 'Ошейниковый пекари'],
            ['Bison bison', 'Бизон'],
        ], 
        'Antarctica' => [
            ['Leptonychotes weddellii', 'Тюлень Уэдделла'],
            ['Hydrurga leptonyx', 'Морской леопард'],
            ['Mirounga', 'Морской слон'],
            ['Pagodroma nivea', 'Снежный буревестник'],
            ['Aptenodytes forsteri', 'Императорский пингвин'],
        ], 
        'Australia' => [
            ['Macropus', 'Кенгуру'],
            ['Ornithorhynchus anatinus', 'Утконос'],
            ['Tachyglossidae', 'Ехидна'],
            ['Macropodidae', 'Валлаби'],
            ['Trichosurus',  'Кузу'],
        ],
    ];
    
    // Проверяем наличие и сохдаем директорию tmp
    $dirTmpName = 'tmp';       // имя директории
    if (is_dir($dirTmpName)) {
        echo "Директория {$dirTmpName} существует</br>";
    }
    else {
        echo "Директории {$dirTmpName} НЕ существует. Создаем</br>";
        mkdir($dirTmpName);
    }
    // Записываем в нее тесты
    foreach ($animalsContinent as $keyContinent => $animals) {
        // Создаем json файл с тестом
        $jsonInfo = json_encode($animals, JSON_UNESCAPED_UNICODE);
        // Записываем в файл json
        $fileName = "{$keyContinent}.json";
        echo "Записываем в файл {$fileName}</br>";
        $filePath = "{$dirTmpName}/{$fileName}";    // путь к файлу
        $fileOpen = fopen("$filePath", 'w');        // открываем файл для записи
        file_put_contents($filePath, $jsonInfo);    // записываем
        fclose($fileOpen);                          // закрываем файл
    }
    echo "Тесты созданы</br>";
    
    // Проверяем наличие и сохдаем директорию server
    $dirServerName = 'server';       // имя директории
    if (is_dir($dirServerName)) {
        echo "Директория {$dirServerName} существует</br>";
    }
    else {
        echo "Директории {$dirServerName} НЕ существует. Создаем</br>";
        mkdir($dirServerName);
    }
?>

<form method="POST" action="admin.php" name="form">
    <br>Продолжем подготовку к тестированию
    <input type="submit" name="submit" value="Продолжить">
</form>