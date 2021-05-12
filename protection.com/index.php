<?php
session_start();


require_once __DIR__.'/vendor/autoload.php';
include 'App/config/config.php';


use Monolog\Logger;
use Monolog\Handler\StreamHandler;
use Monolog\Formatter\HtmlFormatter;
use App\Models\Db;
use App\Models\Register;
use App\Models\Login;
use App\Models\Book;


// Создаем логгер 
$log = new Logger('mylogger');

// Хендлер, который будет писать логи в "mylog.log" и слушать все ошибки с уровнем "WARNING" и выше .
$log->pushHandler(new StreamHandler('mylog.log', Logger::WARNING));

// Хендлер, который будет писать логи в "troubles.log" и реагировать на ошибки с уровнем "ALERT" и выше.
$log->pushHandler(new StreamHandler('troubles.log', Logger::ALERT));


// Добавляем записи
$log->warning('Предупреждение');
$log->error('Большая ошибка');
$log->info('Просто тест');


$token = hash('gost-crypto', random_int(0,999999));
$_SESSION["CSRF"] = $token;


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>autorization</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<link rel="stylesheet" href="public/style.css">
</head>
<body>
    <div class="page">






<div class = "container col-lg-2 col-md-5 col-sm-3 col-xs-6 mt-5">



<form class="form-horizontal" action='App/Models/Register.php' method="POST">
  <fieldset>
  <legend class="">register</legend>
 
    <div class="control-group">
      <!-- E-mail -->
      <label class="control-label" for="email">E-mail</label>
      <div class="controls">
        <input type="text" id="email" name="email" placeholder="" class="input-xlarge">
   
      </div>
    </div>
 
    <div class="control-group">
      <!-- Password-->
      <label class="control-label" for="password">Password</label>
      <div class="controls">
        <input type="password" id="password" name="password" placeholder="" class="input-xlarge">

   
      </div>
      <label class="control-label"></label>
      <div class="controls">
        <input type="checkbox" id="checkbox" name="remember_user" placeholder="" class="input-xlarge"> remember me

   
      </div>
    </div>
 

 
    <div class="control-group">
      <!-- Button -->
      <div class="controls">
        <button id = "button_auth"class="btn btn-success mt-2">Register</button>
        
      </div>
    </div>
  </fieldset>
  </form>
  <!-- <a href="https://oauth.vk.com/access_token?client_id=<?= ID?>&display=page&redirect_uri=<?= URL?>&response_type=code"> войти через VK</a> -->
  <a href="https://oauth.vk.com/authorize?client_id=<?=ID?>&redirect_uri=<?=URL?>&response_type=code" target="_blank">войти через VK</a>
  <br>
  <a href="lock.php" >ссылка только для авторизованных пользователей</a>


  </fieldset>
 


<hr>

<form class="form-horizontal" action='App/Models/Login.php' method="POST">
  <fieldset>
    <div id="legend">
      <legend class="">login</legend>
    </div>
  
 
    <div class="control-group">
      <!-- E-mail -->
      <label class="control-label" for="email">E-mail</label>
      <div class="controls">
        <input type="text" id="email" name="email" placeholder="" class="input-xlarge">
        <input type="hidden" name="token" value="<?php echo $token?>">
   
      </div>
    </div>
 
    <div class="control-group">
      <!-- Password-->
      <label class="control-label" for="password">Password</label>
      <div class="controls">
        <input type="password" id="password" name="password" placeholder="" class="input-xlarge">
     
      </div>
    </div>


   
 
    <div class="control-group">
      <!-- Button -->
      <div class="controls">
        <button class="btn btn-success mt-2">login</button>
      </div>
    </div>
  </fieldset>
</form>

<div class="control-group">
      <!-- Password-->
  
      <button onclick = "alert('welcome!');" disabled class="btn btn-danger mt-2" id="button" >кнопка админа</button>
     
     
      </div>
    </div>


</div>



<script>

let role = "<?php echo $_SESSION['user_role']; ?>";


if (role == 'admin') {
  let but = document.getElementById('button');

  but.disabled = false;
}



</script>


</div>
</body>



</html>