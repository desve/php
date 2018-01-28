<?php header('Content-Type: text/html; charset=utf-8');
    // Домашнее задание к лекции 3.2 Наследование и интерфейсы
    
    // Необходимые интерфейсы
    interface ImputOutputInterfaces
    {
        // Перечисляем общие необходимые функции
        public function __construct($argument1, $argument2, $argument3=null);    // получаем данные
        public function outputTitles($className);               // выводим заголовки
        public function go();                                   // выполняем пример
    }
    
    // Родительский абстрактный-мега-класс
    abstract class MegaClass implements ImputOutputInterfaces
    {
        public $argument1;          // обязательный аргумент 1
        public $argument2;          // обязательный аргумент 2
        public $argument3;          // может не использоваться
        public $subUnderTitle;      // название дочернего класса
        public static $title = '<br>Домашнее задание к лекции 3.2 Наследование и интерфейсы';
        public static $underTitle = 'Название класса ';
        
        public function __construct($argument1, $argument2, $argument3=null) {
            $this->argument1 = $argument1;
            $this->argument2 = $argument2;
            $this->argument3 = $argument3;
        }
        public function outputTitles($note) {
            echo self::$title; 
            echo '<br>'.self::$underTitle."{$this->subUnderTitle} {$note}<br>"; 
            return $this; 
        }
        abstract function go();  // наша выполняемая функция
    }
    
    // Класс автомобиль в аренду
    final class CarRent extends MegaClass
    {
        public $color;
        public $yearOfManufacture = 2015;
        public $defects = null;
        public $subUnderTitle = 'Автомобиль в аренду';
        private $privateCost = 10000;       // Стоимость автомобиля
        private $discount = 0;              // в процентах
        private static $basePrice = 100;    // базовый прайс без учета скидки

        
            //return date('Y') - $this->yearOfManufacture;

        public function getPrivateCost() {
            // Выводим информацию о балансовой стомости машины
            
            // Блок дополнительной обработки приватной информации
            echo "<br>ВНИМАНИЕ! Вы получаете доступ к служебной информации<br>";
            
            return $this->privateCost;
        }
        public function getDiscount($value = 0) {
            // Получаем размер скидки для приватного значения
            
            // Блок дополнительной обработки информации
            if ($value < 0 || $value > 10) {
                echo "<br>ВНИМАНИЕ! Размер скидки-{$value} введен не верно";
            }
            else {
                echo "<br>Размер скидки изменен";
                $this->discount = $value;  
            }
        }
        public function go() {
            echo "Добрый день, {$this->argument1}!<br>";
            echo "Вы взяли в аренду автомобиль {$this->argument2} ";
            echo "{$this->argument3} года выпуска<br>";
            $years = date('Y') - $this->argument3;          // возраст машины
            // 1 % скидки за каждый год от базового прайса
            $price = round(self::$basePrice * (1 - $years/100));  
            $userPrice = round($price * (1 - $this->discount/100));
            echo "Арендная плата составляет {$userPrice} у.е. в день<br>";
        }
    }
    
    // Класс автомобиль на ремонт
    final class CarRepair extends MegaClass
    {
        public $subUnderTitle = 'Автомобиль на техобслуживание';
        public static $warrantyPeriod = 2;  // гарантийный период
        public static $basePrice = 100;     // базовая стоимость ТО
        public static $index = 1.2;         // повышающий кэффициент

        public function go() {
            // Рассчитываем итоговую стоимость ТО
            $years = date('Y') - $this->argument2;
            if ($years <= self::$warrantyPeriod) {
                $finalPrice = self::$basePrice;
            }
            else {
                $finalPrice =  self::$basePrice * self::$index * $years;
            }  
            echo "Стоимость теобслуживания Вашего автомобиля<br>";
            echo "VIN {$this->argument1} Год выпуска {$this->argument2} ";
            echo "Марка {$this->argument3} составляет {$finalPrice} у.е.<br>";
        }
    }
    
    // Класс TV
        final class TV extends MegaClass
    {
        public $subUnderTitle = 'TV';
        public static $diagonalMin = 5;
        public static $diagonalMax = 12;
        public static $counter = 0;
          
        public function go() {
            // Рисуем экран
            $diagonal = $this->argument1;
            ($diagonal < self::$diagonalMin) ? $diagonal = self::$diagonalMin : $diagonal;
            ($diagonal > self::$diagonalMax) ? $diagonal = self::$diagonalMax : $diagonal;
            echo "TV /d= {$diagonal}/<br>";
            for ($i = 1; $i <= round($diagonal); $i++) {
                for ($j = 1; $j <= round($diagonal * 1.5); $j++) {
                    echo $this->argument2;
                }
                echo '<br>';
            }
        }
    }
    
    // Класс- Утиные истории
    final class DuckDuckStories extends MegaClass
    {
        // https://webref.ru/html/img
        public $subUnderTitle = 'Утиные истории';
        const URL = "https://st.kp.yandex.net/im/kadr/1/5/8/kinopoisk.ru-DuckTales-1588";
        
        public function go() {
            // Формируем адрес и выврдим картинку
            $picture = rand(91, 106);
            ($picture < 100) ? $pic = '0'.$picture : $pic = $picture;
            $url = self::URL.(string)$pic.'.jpg';
            echo "<img src='$url' height={$this->argument1} width={$this->argument2}><br><br>";
        }
    }
    
    // Класс- Бегущая строка
    final class MagicSignature extends MegaClass
    {
        // https://webref.ru/html/marquee
        public $direction = 'right';        // движение вправо 
        public $behavior = 'alternate';     // тип движения
        public $subUnderTitle = 'Бегущая строка';
        
        public function go() {
            echo "<marquee scrollamount={$this->argument2} direction={$this->direction} ";
            echo "behavior={$this->behavior}> {$this->argument1} </marquee>";  
        }
    }
    
    // #1-1
    $car1 = new CarRent('Иван', 'Mazda', 2014);
    $car1->outputTitles('№ 1')->go();
    // #1-2
    $car2 = new CarRent('Петр', 'Audi', 2018);
    $car2->getDiscount(5);
    $car2->outputTitles('№ 2')->go();
    // #1-3
    $car3 = new CarRent('Максим', 'Niva', 2008);
    $car3->getDiscount(10);
    $car3->getPrivateCost();  // выводим служебную информацию
    $car3->outputTitles('№ 3')->go();
    
    // #2-1
    $car1 = new CarRepair(123456789, 2017, 'Mazda');
    $car1->outputTitles('№ 1')->go();
    // #2-2
    $car2 = new CarRepair(123456789, 2015, 'Niva');
    $car2->outputTitles('№ 2')->go();
    // #2-3
    $car3 = new CarRepair(123456789, 2010, 'Audi');
    $car3->outputTitles('№ 3')->go();
    
    // #3-1
    $tv1 = new TV(10, 'W');
    $tv1->outputTitles('# 1')->go();
    // #3-2
    $tv2 = new TV(-2, 'Ж');
    $tv2->outputTitles('# 2')->go();
    
    // #4-1
    $story1 = new DuckDuckStories(100, 140);
    $story1->outputTitles('Пр. 1')->go();
    // #4-2
    $story2 = new DuckDuckStories(200, 280);
    $story2->outputTitles('Пр. 2')->go();
    
    // #5-1
    $signature1 = new MagicSignature('Курс PHP/SQL: back-end разработка и базы данных', 30);
    $signature1->outputTitles('Пример 1')->go();
    // #5-2
    $signature2 = new MagicSignature('Блок 3. Объектно-ориентированное программирование', 20);
    $signature2->direction = 'left';        // переопределим направление дыижения
    $signature2->outputTitles('Пример 2')->go();
    // #5-3
    $signature3 = new MagicSignature('Десятов Владимир php-19', 10);
    $signature3->direction = 'left';        // переопределим направление дыижения
    $signature3->behavior = 'slide';        // переопределим тип движения
    $signature3->outputTitles('Пример 3')->go();
    
    
    
    
    
    
?>