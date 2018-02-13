  <form method="POST" name="form">
   <select size="3" name="hero">
    <option disabled>Выберите рыцаря</option>
    <option value="t1" selected>Гавейн</option>
    <option value="t2">Ланселот</option>
    <option value="t3">Галахэд</option>
    <option value="t4">Персиваль</option>
   </select>
   <p><input type="submit" value="Отправить"></p>
  </form>
  
 
<?php header('Content-Type: text/html; charset=utf-8');
    var_dump($_POST);
?>