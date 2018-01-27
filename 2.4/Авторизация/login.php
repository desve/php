<?php
   error_reporting(E_ALL);
   ini_set('display_errors', 1);

   require_once 'core/functions.php';

   if (isAuthorised()) {
       redirect('index');
   }

   $errors = [];
   if (isPost()) {
      if(login(getParamPost('login'), getParamPost('password'))) {
          redirect('index');
      } else {
         $errors[] = 'Ошибка авторизации';
      }
   }
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <title>Авторизация</title>
</head>
<body>
<section id="login">
    <div class="container">
        <div class="row">
            <div class="col-xs-12">
                <div class="form-wrap">
                    <h1>Авторизация</h1>
                    <ul>
                       <?php foreach ($errors as $error): ?>
                           <li><?= $error ?></li>
                       <?php endforeach; ?>
                    </ul>
                    <form method="POST" id="login-form">
                        <div class="form-group">
                            <label for="lg" class="sr-only">Логин</label>
                            <input type="text" placeholder="Логин" name="login" id="lg" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="key" class="sr-only">Пароль</label>
                            <input type="password"  placeholder="Пароль" name="password" id="key" class="form-control">
                        </div>
                        <input type="submit" id="btn-login" class="btn btn-custom btn-lg btn-block" value="Войти">
                    </form>

                    <hr>
                </div>
            </div> <!-- /.col-xs-12 -->
        </div> <!-- /.row -->
    </div> <!-- /.container -->
</section>
</body>
</html>