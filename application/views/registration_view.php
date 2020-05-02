<!DOCTYPE html>
<html lang="en">
<head>
 
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <?//$host = 'http://'.$_SERVER['HTTP_HOST'].'/';?>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="/application/css/style.css">
    <script src="/js/jquery-1.6.2.js" type="text/javascript"></script>
    <title>Главная</title>
</head>
<body>
<div class="logon">
<form action="/logon/reg/" method="POST">
  <div class="form-group">
  <h3>Регистрация</h3>
    <?if (isset($data)) echo $data,"<br>"?>
    <label for="exampleInputEmail1">Придумайте логин</label>
    <input type="login" class="form-control" name="login" aria-describedby="emailHelp">
    <!--small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small-->
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Придумайте пароль</label>
    <input type="password" class="form-control" name="password">
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Повторите пароль</label>
    <input type="password" class="form-control" name="password-repeat">
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Введите ваш E-mail</label>
    <input type="email" class="form-control" name="email">
  </div>
  <button type="submit" class="btn btn-primary">Регистрация</button>
</form>
</div>
</body>
</html>