<?php header('Content-Type: text/html; charset=utf-8');

    function enumerator($file) {
        //  Счетчик баллов
        if($file) {
            $register = file_get_contents($file);   
            $register++; 
        }
        else {
            $register = 1;
        }
        file_put_contents($file, $register);
        return $register;
    }
    
    function isInTests($array) {
        // Простенькая проверка на правильность ссылки теста
        $trueTest = ['Africa.json', 'Eurasia.json', 'America.json', 'Antarctica.json', 'Australia.json'];
        $trueNumber = [0, 1, 2, 3, 4];
        if (in_array($array['test'], $trueTest) && 
            in_array($array['random'], $trueNumber)) return true;
        else return false;
    }
    
?>