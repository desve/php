<?php header('Content-Type: text/html; charset=utf-8');

    require_once('./tools/tools.php');  
    require_once('./classes/meraclassclass.php');
    spl_autoload_register('myAutoloadClass');
    spl_autoload_register('myAutoloadCart');
    spl_autoload_register('myAutoloadOrder');

    // Создаем новую корзину
    $cart1 = new Cart();

    // Выбираем товар/услугу. Кладем товар
    $carRent1 = new CarRent('Иван', 'Mazda', 2014);
    $carRent2 = new CarRent('Петр', 'Audi', 2018);
    $carRent3 = new CarRent('Максим', 'Niva', 2008);
    $cart1->choiceProduct($carRent1, 1);
    $cart1->choiceProduct($carRent2, 1);
    $cart1->choiceProduct($carRent3, 1);
    
    $carRepair1 = new CarRepair(123456789, 2017, 'Mazda');    
    $carRepair2 = new CarRepair(123456789, 2015, 'Niva');
    $carRepair3 = new CarRepair(123456789, 2010, 'Audi');
    $cart1->choiceProduct($carRepair1, 1);
    $cart1->choiceProduct($carRepair2, 1);
    $cart1->choiceProduct($carRepair3, 1);
    $tv1 = new TV(10, 'W');
    $tv2 = new TV(-2, 'Ж');
    $cart1->choiceProduct($tv1, 1);
    $cart1->choiceProduct($tv2, 2);
    $story1 = new DuckDuckStories(100, 140);
    $story2 = new DuckDuckStories(200, 280);
    $cart1->choiceProduct($story1, 4);
    $cart1->choiceProduct($story2, 5);
    $signature1 = new MagicSignature('Курс PHP/SQL: back-end разработка и базы данных', 30);
    $signature2 = new MagicSignature('Блок 3. Объектно-ориентированное программирование', 20);
    $signature3 = new MagicSignature('Десятов Владимир php-19', 10);
    $cart1->choiceProduct($signature1, 1);
    $cart1->choiceProduct($signature2, 1);
    $cart1->choiceProduct($signature2, 1);
    
    // Метод для просмотра содержимого корзины
    $cart1->printCart();
    
    // Метод для оформления заказа
    $order1 = new Order($cart1);
    // Смотрим содержимое заказа
    $order1->printOrder();

 
?>