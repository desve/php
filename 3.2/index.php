<?php header('Content-Type: text/html; charset=utf-8');
    // http://seo-mayak.com/sozdanie-bloga/wordpress-dlya-novichkov/animaciya-dlya-sajta-begushhaya-stroka-html-teg-marquee.html
    // https://ezgif.com/
    // Родительский абстрактный-мега-класс
    class Parental
    {
        public $bgcolor = '#F5FF37';    // цвет фона
        public $width = '700';          // ширина
        public $height = '60';          // высота
        public $scrollamount = '12';    // скорость движения
        public $direction = 'right';    // направлением движения
        public $string = '++++';        // текст
        public $numberImg;              // ноиер картинки
        public static $style = 'border: 2px solid #000000; color: #D9470D; font-size: 40px; font-weight: bolder; line-height: 150%; text-shadow: #000000 0px 1px 1px;';

        public function __construct($argument1) {
            $this->numberImg = $argument1;
        }
        public function goGo() {
            echo "<marquee bgcolor={$this->bgcolor} width={$this->width} ";
            echo "height={$this->height} scrollamount={$this->scrollamount} "; 
            echo "direction={$this->direction} style={self::style}>";
            //echo "{$this->string}";     
            echo "<img src='dog_{$this->numberImg}.gif' />";
            echo "</marquee><br>";
        }
    }
    
    echo "1. Полиморфизм — в моем понимании это способность обьекта использовать методы производного класса, который не существует на момент создания базового<br>";
    echo "2. Наследование позволяет переопределить функционал уже имеющихся классов в классах-наследниках<br>";
    echo "<br>Например,<br>";
    $spring1 = new Parental(1);
    $spring1->goGo();  
    echo "<br>Сделать их сильнее<br>";
    $spring2 = new Parental(2);
    $spring2->height  = 110;
    $spring2->goGo(); 
    echo "<br>и быстрее )))<br>";
    $spring3 = new Parental(2);
    $spring3->height  = 110;
    $spring3->scrollamount  = 30;
    $spring3->goGo(); 
    echo "<br>Интерфейс - задает обязательные методы, которые должны быть у класса<br>";
    echo "То же можно сделать и в абстрактном классе<br>";
    echo "Для меня Интерфейс- это своего рода 'напоминалка' чего надо не забыть при конструировании Класса<br>";
    echo "<br>¯\_(ツ)_/¯<br>";
?>

