<?php header('Content-Type: text/html; charset=utf-8');

    // $className содержит название класса, который мы вызыаем
    function myAutoloadClass($className) {
        $filePath = "./classes/".strtolower($className)."class.php";
        if (file_exists($filePath)) {
            include "$filePath"; 
        }
    }
    // $className содержит название класса, который мы вызыаем
    function myAutoloadCart($className) {
        $filePath = "./cart/".strtolower($className)."class.php";
        if (file_exists($filePath)) {
            include "$filePath"; 
        }
    }
    
    // $className содержит название класса, который мы вызыаем
    function myAutoloadOrder($className) {
        $filePath = "./order/".strtolower($className)."class.php";
        if (file_exists($filePath)) {
            include "$filePath"; 
        }
    }
    
?>