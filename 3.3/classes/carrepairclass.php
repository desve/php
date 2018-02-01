<?php header('Content-Type: text/html; charset=utf-8');

    // Класс автомобиль на ремонт
    final class CarRepair extends MegaClass
    {
        public $subUnderTitle = 'Автомобиль на техобслуживание';
        public $userPrice;                  // итоговая стоимость
        public static $warrantyPeriod = 2;  // гарантийный период
        public static $basePrice = 100;     // базовая стоимость ТО
        public static $index = 1.2;         // повышающий кэффициент

        public function go() {
            $userPrice = $this->pricing();
            echo "Стоимость теобслуживания Вашего автомобиля<br>";
            echo "VIN {$this->argument1} Год выпуска {$this->argument2} ";
            echo "Марка {$this->argument3} составляет {$userPrice} у.е.<br>";
        }
        public function pricing() {
            // Рассчитываем итоговую стоимость ТО
            $years = date('Y') - $this->argument2;
            if ($years <= self::$warrantyPeriod) {
                $userPrice = self::$basePrice;
            }
            else {
                $userPrice =  self::$basePrice * self::$index * $years;
            } 
            return $userPrice;
        }
    }
    
?>