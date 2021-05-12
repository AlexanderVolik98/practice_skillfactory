<?php
namespace App\Models;
use App\Models\Db;
include 'Db.php';
session_start();
include '../lib/dev.php';


class Login {

    

    private function check_hash_pass($post, $hash) {
    

        for ($i=0; $i < count($hash); $i++) { 


            if (password_verify($post['password'], $hash[$i]['PASSWORD'])) return true;
            

        }
            


    }
 

    public function authentication($post) {
         
    
        if($post["token"] == $_SESSION["CSRF"]) {
              
           
              $LOGIN = $post['email'];
          
              
        $connect = require '../config/db_conf.php';
       
        $db = new Db($connect);
        
        $password_array_hash = $db->row("SELECT PASSWORD FROM users where LOGIN = '$LOGIN'");
        if (($this->check_hash_pass($post, $password_array_hash) == true)) {

                echo 'пароль верен';
            
                $user_role = $db->row("SELECT user_role FROM users where LOGIN = '$LOGIN'");
                $user_role = $user_role[0]['user_role'];
                setcookie('user', $LOGIN, time() + 3600, "/");
                setcookie('user_role', $user_role, time() + 3600, "/"); 
                $_SESSION['user_role'] = $user_role;
                header('Location: /');
        }
        else {
            echo 'пароль введен неверно';


        }
     
          



    }
    }



  
             


    public function authorization($user) {

    }
}


$login = new Login;

$login->authentication($_POST);
