<?php header('Content-Type: text/html; charset=utf-8');
    
    // Необходимые интерфейсы
    interface MegaClassInterfaces
    {
        // Перечисляем общие необходимые функции
        public function __construct($argument1, $argument2, $argument3=null);    // получаем данные
        public function outputTitles($className);               // выводим заголовки
        public function go();                                   // выполняем пример
        public function pricing();                              // расчет цены
    }
    
    // Родительский абстрактный-мега-класс Продукт
    abstract class MegaClass implements MegaClassInterfaces
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
        abstract function go();         // наша выполняемая функция
        abstract function pricing();    // расчет цены
    }
    
?>