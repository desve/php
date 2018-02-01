<?php header('Content-Type: text/html; charset=utf-8');

    // Класс автомобиль в аренду
    final class CarRent extends MegaClass
    {
        public $color;
        public $yearOfManufacture = 2015;
        public $defects = null;
        public $subUnderTitle = 'Автомобиль в аренду';
        public $userPrice;                  // итоговая стоимость
        private $privateCost = 10000;       // стоимость автомобиля
        private $discount = 0;              // в процентах
        static $basePrice = 100;            // базовый прайс без учета скидки

        
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
        public function pricing() {
            // Расчет цены товара
            $years = date('Y') - $this->argument3;          // возраст машины
            // 1 % скидки за каждый год от базового прайса
            $price = round(self::$basePrice * (1 - $years/100));  
            $userPrice = round($price * (1 - $this->discount/100));
            $this->userPrice = $userPrice;
            return $userPrice;
        }
        public function go() {
            echo "Добрый день, {$this->argument1}!<br>";
            echo "Вы взяли в аренду автомобиль {$this->argument2} ";
            echo "{$this->argument3} года выпуска<br>";
            $userPrice = $this->pricing();
            echo "Арендная плата составляет {$userPrice} у.е. в день<br>";
        }
    }
    
?>
    