<?php header('Content-Type: text/html; charset=utf-8');
    
    // Необходимые интерфейсы
    interface CartInterfaces
    {
        // Перечисляем общие необходимые функции
        public function choiceProduct($item, $number);          // выбираем товар /услугу
        public function printCart();                            // Выводим содержимое корзины
    }
    
    // Родительский класс корзина
    class Cart implements CartInterfaces
    {
        public $products = [];          // пустая корзина;
        
        public function choiceProduct($item, $number) {
            // Добавляем товар в корзину 
            $price = $item->pricing();
            $priceTotal = $price * $number;
            echo "Товар: '{$item->subUnderTitle}' добавлен в корзину. ";
            echo "Количество {$number}. ";
            echo "Цена за товар {$price} у.е. за единицу. ";   
            echo "Итого {$priceTotal} у.е.. <br>"; 
            $this->products[] = array($item, $number, $price, $priceTotal);
        }
        public function printCart() {
            // Выводим содержимое корзины
            echo "<br>В Вашей корзине находится:<br>";
            foreach ($this->products as $value) {
                echo "{$value[0]->subUnderTitle} ";
                echo "количество {$value[1]} ";
                echo "цена за единицу {$value[2]} ";
                echo "общая стоимость {$value[3]} <br>";
                //var_dump($value);
            }
        }
    }
    
?>