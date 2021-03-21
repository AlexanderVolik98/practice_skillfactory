<?php

namespace application\models;
use application\core\model;
use application\models\db;

    class account extends model{
        
      

public function reg($post) {
    $db = new db;
    $error_reg = [];
    $notice_reg = [];

    $login = trim($post['login']);
    $name = trim($post['name']);
    $password = trim($post['password']);
 

    if (empty($post['login']) || empty($post['name']) || empty($post['password'])) {
   $error_reg = ['error_reg' => 'заполните все пустующие поля'];
     return $error_reg;
    }

 
 

    elseif (iconv_strlen($password) < 8) {
     $error_reg = ['error_reg' => 'пароль должен состоять из восьми и более символов'];
     return $error_reg;
    }
    elseif (iconv_strlen($login) < 5) {
    $error_reg = ['error_reg' => 'введена некорректная почта'];
    return $error_reg;
}
    

    elseif(!empty($db->row("SELECT * FROM `users` WHERE `login` = '$login'"))) {
       // var_dump($db->row("SELECT * FROM `users` WHERE `login` = '$login'"));
        $error_reg = ['error_reg' => 'пользователь с такой электронной почтой уже существует, пожалуйста, <a href = "/account/login" class = "mainLink"> авторизуйтесь</a>'];
        return $error_reg;
    }
    
    
    
    else  {

        $password = md5($password. "jDlfEOndNdlsD2");
       
     
      
      $db->query("INSERT INTO `users` (`id`, `username`, `login`, `password`) VALUES (NULL, '$name', '$login', '$password')");

      header('Location: /');
      header('Location: /account/login');
    }
}



public function auth($post) {
    $db = new db;
    $error = [];
    $notice = [];
if (empty($post['login']) || empty($post['password'])) {
    $error = ['error' => 'заполните все пустующие поля'];
    return $error;

}
else {

        $login = trim($post['login']);
        $password = trim($post['password']);
   
       $password = md5($password. "jDlfEOndNdlsD2");
       $result =  $db->row("SELECT * FROM `users` WHERE `password` = '$password' AND `login` = '$login'");

       $password_check = $db->row("SELECT * FROM `users` WHERE `password` = '$password'");
       $login_check = $db->row("SELECT * FROM `users` WHERE `login` = '$login'");

     //  var_dump($password_check);
    //   var_dump($login_check);

       if (!empty($login_check) && empty($password_check)) {
               $error = ['error' => 'Здравствуйте! Вы ввели неверный пароль'];
               return $error;
           }

        if (empty($result)) {
            $error = ['error' => 'такого пользователя не найдено, нет аккаунта? <a class = "mainLink" href = "/account/registration">Зарегистрируйтесь </a>'];
            return $error;
        }

      


            else {

            
   // var_dump($result)
            setcookie('user', $result[0]['username'], time() + 3600, "/");
            setcookie('user_id', $result[0]['id'], time() + 3600, "/");
            //здесь мы задаем нашу куки


            header('Location: /');
        }
     
   
    
    }   
}
    
  

    public function exit_account($result) {
        setcookie('user', $result[0]['username'], time() - 3600, "/");
        setcookie('user_id', $result[0]['username'], time() - 3600, "/");
        
 
        header('Location: /');
    }


}



    



