<?php header('Content-Type: text/html; charset=utf-8');

    echo 'Домашнее задание к лекции 1.3 «Строки, массивы и объекты»'.'</br>'.'</br>';
    
    // Задаем массив
    $animals = [
        'Africa' => [
            'Panthera leo',  // Лев
            'Hyaenidae',  // Гиена
            'Canis aureus',  // Шакал
            'Elephantidae',  // Слон
            'Ceratotherium simum',  // Белый носорог
        ], 
        'Eurasia' => [
            'Cervus elaphus',  // Благородный олень
            'Leporidae',  // Заяц
            'Ursus arctos',  // Бурый медведь
            'Lynx',  // Рысь
            'Gulo gulo',  // Росомаха
        ], 
        'America' => [
            'Mammuthus columbi',  // Мамонт Колумба
            'Nasua narica',  // Коати
            'Вилорог',  // Вилорог
            'Pecari tajacu',  // Ошейниковый пекари
            'Bison bison',  // Бизон
        ], 
        'Antarctica' => [
            'Leptonychotes weddellii',  // Тюлень Уэдделла
            'Hydrurga leptonyx',  // Морской леопард
            'Mirounga',  // Морской слон
            'Pagodroma nivea',  // Снежный буревестник
            'Aptenodytes forsteri',  // Императорский пингвин
        ], 
        'Australia' => [
            'Macropus',  // Кенгуру
            'Ornithorhynchus anatinus',  // Утконос
            'Tachyglossidae',  // Ехидна
            'Macropodidae',  // Валлаби
            'Trichosurus',  // Кузу
        ],
    ];
    
    function anatinusTwoWordsOnly($animalsAll) {
        // Составляем новый массив (только из двух слов)
        $animalsTwoWords = null;
        foreach ($animalsAll as $keyContinent => $animals) {
            $animalsContinent = null;
            foreach($animals as $item) {
                if(count(explode(' ', $item)) == 2) {
                    $animalsContinent[] = $item;
                }           
            }
            $animalsTwoWords[$keyContinent] = $animalsContinent;
        }
        return $animalsTwoWords;
    }
    
    function animalsNewArray($animalsTwoWords) {
        // Создаем новый массив по заданному правилу
        $wordTwoArray = null;
        foreach ($animalsTwoWords as $animalsContinent) {
            foreach ($animalsContinent as $item) {
                $wordTwoArray[] = explode(' ', $item)[1];
            } 
        } 
        
        // Перемешиваем элементы массива из вторых слов
        shuffle($wordTwoArray);
        
        // Создаем массив НЕ существующих животных
        $animalsTwoWordRandom = null;
        foreach ($animalsTwoWords as $keyContinent => $animals) {
            $animalsContinent = null;
            foreach($animals as $item) {  
                $animalsContinent[] = explode(' ', $item)[0].' '.array_shift($wordTwoArray);
            }
            $animalsTwoWordRandom[$keyContinent] = $animalsContinent;
        }
        return $animalsTwoWordRandom; 
    }
    
    function printArray(&$arrayToPrint) {
        // Красивая печать массива
        echo '<pre>';
        print_r($arrayToPrint);
        echo '</br>';
    }
    
    function printNewFormat(&$animalsTwoWordRandom) {
        // Выводим животных в нужном формате
        foreach ($animalsTwoWordRandom as $keyContinent => $animals) {
            echo '<h2>'.'Континент '.$keyContinent.'</h2>';
            $animalCount = count($animals);
            foreach ($animals as $key => $animal) {
                if ($key < $animalCount - 1) {
                    echo $animal.', ';
                }
                else {
                    echo $animal;
                }
            }
        }
        echo '</br>'.'</br>';
    }
    
    // Выводим первоначальный массив реальных животных
    echo 'Первоначальный массив реальных животных'.'</br>';
    printArray($animals);
     
    // Выводим массив животных из 2-х слов
    echo 'Массив животных из 2-х слов'.'</br>'.'</br>';
    $animalsTwoWords = anatinusTwoWordsOnly($animals);
    printArray($animalsTwoWords);
    
    // Создаем массив НЕ существующих животных
    $animalsTwoWordRandom = animalsNewArray($animalsTwoWords);
    echo 'Массив  НЕ существующих животных'.'</br>';
    printArray($animalsTwoWordRandom);
    
    // Дополнительно
    echo 'Дополнительно'.'</br>'.'</br>';
    // Выводим животных в нужном формате
    printNewFormat($animalsTwoWordRandom);
    
    echo "<img src=New_Year.jpeg>"; 
?>
