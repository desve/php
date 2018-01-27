<?php header('Content-Type: text/html; charset=utf-8');
    echo 'Домашнее задание к лекции 3.1 Классы и объекты<br>';

    // Класс автомобиль для сдачи в аренду
    class GetCarRent
    {
        public $color;
        public $yearOfManufacture = 2015;
        public $name;
        public static $counter = 0;
        private $privateCost = 10000;
        private $discount;
        
        public function age() {
            // Определяем возраст авто
            return date('Y') - $this->yearOfManufacture;
            }
        public function informationAboutDefects($defect = 'Дефектов не обнаружено') {
            // Выводим информацию о визуальном осмотре
            echo '<br>'.$defect;
        }
        public function __construct($name) {
            $this->name = $name;    // имя арендатора
            self::$counter++;       // считаем число обращения
        }
        public function getPrivateCost() {
            // Геттер
            // Выводим информацию о балансовой стомости машины
            
            // Блок дополнительной обработки приватной информации
            echo "<br>ВНИМАНИЕ! Вы получаете доступ к служебной информации<br>";
            
            return $this->privateCost;
        }
        public function getDiscount($value = 0) {
            // Сеттер
            // Получаем размер скидки для приватного значения
            
            // Блок дополнительной обработки информации
            if ($value < 0 || $value > 10) {
                echo "<br>ВНИМАНИЕ! Размер скидки-{$value} введен не верно";
            }
            else {
                echo "<br>Скидка {$value} задана /проверка сеттера/";
                $this->discount = $value;  
            }
        }
    }
    
    echo "<br>Класс Авто в аренду<br>";
    $car = new GetCarRent('Иван');
    echo "<br>Стоимость автомобиля: {$car->getPrivateCost()}";
    $car->getDiscount();
    $car->getDiscount(15);
    $car->getDiscount(4);
    echo "<br>Арендатор: {$car->name}";
    echo "<br>Цвет: {$car->color}";
    echo "<br>Год выпуска: {$car->yearOfManufacture}";
    echo "<br>Возраст автомобиля: {$car->age()}";
    $car->informationAboutDefects();                    // значение по умолчанию
    $car->informationAboutDefects('Царапина на правом крыле');
    $carsRent = GetCarRent::$counter;
    echo "<br>Сдано автомобилей в аренду: {$carsRent}";
    
    $car = new GetCarRent('Перт');
    $car->color = 'red';
    echo "<br>Цвет: {$car->color}";
    $carsRent = GetCarRent::$counter;
    echo "<br>Сдано автомобилей в аренду: {$carsRent}";
    
    
    // Класс автомобиль на ТО
    class GetCarRepair
    {
        public $yearOfManufacture;          // год выпуска
        public $brand;                      // марка авто
        public $vin;                        // вин
        public static $counter = 0;         // счетчик
        public static $warrantyPeriod = 2;  // гарантийный период
        public static $basePrice = 100;     // базовая стоимость ТО
        public static $index = 1.2;         // повышающий кэффициент

        public function __construct($vin, $year, $brand) {
            $this->vin = $vin;     
            $this->yearOfManufacture = $year; 
            $this->brand = $brand; 
            self::$counter++;       // считаем число обращения
        }
        public function price() {
            // Рассчитываем итоговую стоимость ТО
            $years = date('Y') - $this->yearOfManufacture;
            if ($years <= self::$warrantyPeriod) {
                return self::$basePrice;
            }
            else {
                return self::$basePrice * self::$index * $years;
            }  
        }
    }
    
    echo "<br><br>Класс Авто в ремонт<br>";
    $car1 = new GetCarRepair(123456789, 2017, 'Mazda');
    echo "<br>Стоимость Вашего ремонта {$car1->price()}";
    $carsRepair = GetCarRepair::$counter;
    echo "<br>Сдано автомобилей в аренду: {$carsRepair}";

    echo "<br><br>Класс Авто в ремонт<br>";
    $car2 = new GetCarRepair(123456789, 2016, 'Audi');
    echo "<br>Стоимость Вашего ремонта {$car2->price()}";
    $carsRepair = GetCarRepair::$counter;
    echo "<br>Сдано автомобилей в аренду: {$carsRepair}";
    
    echo "<br><br>Класс Авто в ремонт<br>";
    $car3 = new GetCarRepair(123456789, 2015, 'BMW');
    echo "<br>Стоимость Вашего ремонта {$car3->price()}";
    $carsRepair = GetCarRepair::$counter;
    echo "<br>Сдано автомобилей в аренду: {$carsRepair}";
    
    echo "<br><br>Класс Авто в ремонт<br>";
    $car4 = new GetCarRepair(123456789, 2015, 'Niva');
    echo "<br>Стоимость Вашего ремонта {$car4->price()}";
    $carsRepair = GetCarRepair::$counter;
    echo "<br>Сдано автомобилей в аренду: {$carsRepair}";
    
    
    // Класс TV
    class TV
    {
        public $diagonal;
        public $simbol = 'X';
        public static $diagonalMin = 8;
        public static $diagonalMax = 15;
        public static $counter = 0;
          
        public function tv($value=15) {
            // Рисуем экран
            ($value < self::$diagonalMin) ? $value = self::$diagonalMin : $value;
            ($value > self::$diagonalMax) ? $value = self::$diagonalMax : $value;
            $tvNumber = TV::$counter;
            echo "<br>TV {$tvNumber} /d= {$value}/<br>";
            for ($i = 1; $i <= round($value); $i++) {
                for ($j = 1; $j <= round($value * 1.5); $j++) {
                    echo $this->simbol;
                }
                echo '<br>';
            }
        }
            
        public function __construct($point='X') { 
            $this->diagonal = $value; 
            $this->simbol = $point;
            self::$counter++;       // счетчик
        }
    }
    
    echo "<br><br>Класс TV<br><br>";
    $tv1 = new TV();
    $tv2 = new TV('W');
    $tv3 = new TV('Ж');
    
    // Смотрим что получается
    $tv1->tv(4);
    $tv2->tv(10);
    $tv3->tv(100);
    
    
    // Класс Утиные истриии!
    class DuckDuckStories
    {
        const URL = "https://st.kp.yandex.net/im/kadr/1/5/8/kinopoisk.ru-DuckTales-1588";
        
        public function duckDuckPhoto() {
            // Формируем адрес и выврдим картинку
            $picture = rand(91, 106);
            ($picture < 100) ? $pic = '0'.$picture : $pic = $picture;
            $url = self::URL.(string)$pic.'.jpg';
            echo "<img src= '$url'>";
        }
    }
    
    echo "<br><br>Класс Утиные истории<br><br>";
    $stories1 = new DuckDuckStories();
    $stories2 = new DuckDuckStories();
    $stories3 = new DuckDuckStories();
    
    $stories1->duckDuckPhoto();
    $stories2->duckDuckPhoto();
    $stories3->duckDuckPhoto();
    
    
    // Класс Бегущая строка
    class MagicSignature 
    {
        public $scrol;
        public $direction = 'right';
        public $behavior = 'alternate';
        
        public function signatureGo($str) {
            echo "<marquee scrollamount={$this->scrol} direction={$this->direction} ";
            echo "behavior={$this->behavior}> {$str} </marquee>";
        }
    
        public function __construct($scrol) { 
            $this->scrol = $scrol; 
        }
    }
    
    echo "<br><br>Класс Безущая строка<br><br>";
    $signature1 = new MagicSignature(30);
    $signature2 = new MagicSignature(20);
    $signature3 = new MagicSignature(10);
    
    $signature2->direction = 'left';
    $signature3->behavior = 'slide';
    $signature3->direction = 'left';
    
    $signature1->signatureGo('Блок 3. Объектно-ориентированное программирование');
    $signature2->signatureGo('Занятие 3.1. Классы и объекты');
    $signature3->signatureGo('Десятов Владимир PHP-19');
  
?>