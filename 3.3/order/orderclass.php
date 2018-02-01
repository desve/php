<?php 
    
    // Класс заказ
    class Order
    {
        public $order;
        public function __construct($order) {
            $this->order = $order;
        }
        
        public function printOrder() {
            // Выводим содержимое корзины
            echo "<br>В Вашем заказе находится:<br>";
            foreach($this->order->products as $product) {
                echo "'{$product[0]->subUnderTitle}'";
                echo "в количестве $product[1] на сумму $product[3] у.е.<br>";
            }
        }
    }
    
?>