<?php header('Content-Type: text/html; charset=utf-8');

    // Генерируем сертификат с результатами
    $fileResult = "points.txt";
    $result = file_get_contents($fileResult);   // результат
    $name = $_POST['userName'];                 // имя
    $sex = $_POST['sex'];                       // пол

    header ('Content-Type: image/png');
    $image = imagecreatetruecolor(1000, 1200)
        or die('Невозможно инициализировать GD поток');
    
    $backColor = imagecolorallocate($image, 255, 83, 13);
    $textColor = imagecolorallocate($image, 0, 0, 0);
    
    $boxFile = __DIR__."/background.png";
    $imBox = imagecreatefrompng($boxFile);

    imagefill($image, 0, 0, $backColor);
    imagecopy($image, $imBox, 118, 50, 0, 0, 765, 399);   
    
    $fontFile = __DIR__."/Roboto-Black.ttf";
    imagettftext($image, 50, 0, 100, 550, $textColor, $fontFile, 'СЕРТИФИКАТ');
    imagettftext($image, 30, 0, 100, 650, $textColor, $fontFile, "подтверждает, что {$name}");
    if($sex === 'Мужской') {
        imagettftext($image, 30, 0, 100, 750, $textColor, $fontFile, 'прошел курс он-лайн обучения');
    }
    else {
        imagettftext($image, 30, 0, 100, 750, $textColor, $fontFile, 'прошла курс он-лайн обучения');
    }
    imagettftext($image, 30, 0, 100, 850, $textColor, $fontFile, 'латинскому языку');
    imagettftext($image, 30, 0, 100, 950, $textColor, $fontFile, 'и по результатам тестирования набрал');
    imagettftext($image, 30, 0, 100, 1050, $textColor, $fontFile, "{$result} баллов");

 
    header('Content-Type: image/png');
    imagepng($image);
    imagedestroy($image);


?>