<?php header('Content-Type: text/html; charset=utf-8');

    // Класс TV
        final class TV extends MegaClass
    {
        public $subUnderTitle = 'TV';
        public $userPrice;                  // итоговая стоимость
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
            $this->userPrice = $this->pricing();  // найдем цену товара
        }
        public function pricing() {
            // Расчет цены товара
            $userPrice = 10;
            $this->userPrice = $userPrice;
            return $userPrice;
        }
    }
    
?>
    