<?php header('Content-Type: text/html; charset=utf-8');

    // Класс- Бегущая строка
    final class MagicSignature extends MegaClass
    {
        // https://webref.ru/html/marquee
        public $userPrice;                  // итоговая стоимость
        public $direction = 'right';        // движение вправо 
        public $behavior = 'alternate';     // тип движения
        public $subUnderTitle = 'Бегущая строка';
        
        public function go() {
            echo "<marquee scrollamount={$this->argument2} direction={$this->direction} ";
            echo "behavior={$this->behavior}> {$this->argument1} </marquee>";  
        }
        public function pricing() {
            // Расчет цены товара
            $userPrice = 5;
            $this->userPrice = $userPrice;
            return $userPrice;
        }
    }
    
?>