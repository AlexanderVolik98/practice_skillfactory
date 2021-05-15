<?php
namespace App\Models; 
require 'Db.php';

use App\Models\Db;


var_dump($_POST);


class Register {

  

    private function hash($pass) {
      $pass = password_hash($pass, PASSWORD_DEFAULT);
      return $pass;

    }


    private function validate($email) {
        $connect = include '../config/db_conf.php';
        $db = new Db($connect);
       
       $notice = $db->row("select LOGIN from users where LOGIN = '$email'");
       $notice = $notice[0]['LOGIN'];
        if ($email === $notice) {

       
       echo "пользователь с такой почтой $notice уже зарегистрирован <a href = '/'>на главную</a>";
       exit;
    }
    } 


   public function reg ($post) {

    if($_POST["token"] == $_SESSION["CSRF"])
    {
    
  
    if (isset($post['email']) and (isset($post['password']))) {
        $email = trim($post['email']);
        $pass = trim($post['password']);
        $this->validate($email);
        $pass_hash = $this->hash($pass);
        var_dump($pass_hash);
        var_dump($email);
        $connect = include '../config/db_conf.php';
        $db = new Db($connect);
        
        $db->query("INSERT INTO `users` (`id`, `LOGIN`, `PASSWORD`, `user_role`) values (NULL, '$email', '$pass_hash', DEFAULT)");
      
    }


    if ($post['remember_user'] = 'on') {
        $token = hash('gost-crypto', random_int(0,999999));
        setcookie('user', $token, time() + 3600, "/");
      
    }
    //сохраняем в куки хеш, если пользователь нажал кнопку запомнить меня

    
}
}
}

$reg = new Register;

$reg->reg($_POST);

?>