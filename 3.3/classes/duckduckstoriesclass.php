<?php header('Content-Type: text/html; charset=utf-8');

    // Класс- Утиные истории
    final class DuckDuckStories extends MegaClass
    {
        // https://webref.ru/html/img
        public $userPrice;                  // итоговая стоимость
        public $subUnderTitle = 'Утиные истории';
        const URL = "https://st.kp.yandex.net/im/kadr/1/5/8/kinopoisk.ru-DuckTales-1588";
        
        public function go() {
            // Формируем адрес и выврдим картинку
            $picture = rand(91, 106);
            ($picture < 100) ? $pic = '0'.$picture : $pic = $picture;
            $url = self::URL.(string)$pic.'.jpg';
            echo "<img src='$url' height={$this->argument1} width={$this->argument2}><br><br>";
        }
        public function pricing() {
            // Расчет цены товара
            $userPrice = 15;
            $this->userPrice = $userPrice;
            return $userPrice;
        }
    }
    
?>