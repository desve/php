<?php header('Content-Type: text/html; charset=utf-8');
    echo 'Курс PHP/SQL: back-end разработка и базы данных<br><br>';

    function cleanDir($dirName) {
        // Проверяем наличие файлов в директории
        // При их наличии- удаляем
        $files = scandir($dirName);   
        unset($files[0]);               // удаляем служебные символы
        unset($files[1]);               // удаляем служебные символы
        if (!empty($files)) {
            foreach ($files as $file) {
                unlink("{$dirName}/{$file}");  
            }
        } 
    }
    
    // Зададим путь на server
    $dir = dirname(__FILE__);       // определяем текущую директорию
    $dirServer = $dir."/server";    // путь к серверу
    // Проверяем наличие файлов в директории server и удаляем их
    cleanDir($dirServer);
?>    

<!-- Задаем форму для ввода файлов -->
<form method="POST" enctype="multipart/form-data" name="myForm">
    Выберете файлы для отправки на сервер</br></br>
    <input type="file" name="test_1">
    <input type="file" name="test_2">
    <input type="file" name="test_3">
    <input type="file" name="test_4">
    <input type="file" name="test_5">
    <input type="submit" name="Оправить на server">
</form>

<?php 
    // Пересылаем выбранные файлы на сервер
    if (isset($_FILES)) {
        foreach ($_FILES as $key => $value) {
            $valueName = $value['name'];
            if (move_uploaded_file($value['tmp_name'], "{$dirServer}/{$valueName}")) {
                echo "Файл {$valueName} записан на сервер</br>";
            }
            else {
                echo "Файл НЕ передан.</br>";
            }
        }
    }
?>

<form method="POST" action="list.php" name="form">
    <br>Продолжим
    <input type="submit" name="submit" value="Продолжим">
</form>


