<?php header("Content-Type: text/html; charset=utf-8");

    echo "Домашнее задание к лекции 1.2 «Основы PHP»"."</br>";
    
    $numberUser = rand(0,100);
    echo "Пользователь ввел число ".$numberUser."</br>";
    $numberOne = 1;
    $numberTwo = 1;
    function numberSeries($numberOne, $numberTwo, $numberUser) {
        if($numberOne > $numberUser) {
            echo "Задуманное число НЕ входит в числовой ряд"."</br>";
            echo "The END:)";
        }
        else {
            if($numberOne == $numberUser) {
                echo "Задуманное число входит в числовой ряд"."</br>";
                echo "The END:)";
            }
            else {
                $numberThree = $numberOne;
                $numberOne += $numberTwo;
                $numberTwo = $numberThree;
                echo "Выводим числа Фибоначчи ".$numberOne."</br>";
                numberSeries($numberOne, $numberTwo, $numberUser);
            }  
        }
    }
    numberSeries($numberOne, $numberTwo, $numberUser);
?>
