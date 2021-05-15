<?php

namespace App\Models;

require_once('../../vendor/autoload.php');
include '../lib/dev.php';

use App\Models\Db;
use Monolog\Handler\ErrorLogHandler;
use Monolog\Handler\StreamHandler;
use Monolog\Logger;
use Psr\Log\LoggerInterface;
use Psr\Log\NullLogger;

session_start();







class Login {


    private $logger;

    public function __construct(LoggerInterface $logger)
    {
        $this->logger = $logger;
    }
 

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
            $this->logger->info("была произведена попытка войти в аккаунт $LOGIN, введен неверный пароль");
     


        }
     
          



    }
    }



  
             


    public function authorization($user) {

    }
}

$log = new Logger('error_login');
$log->pushHandler(new StreamHandler('../../error_log.log', LOGGER::DEBUG));




$login = new Login($log);

$login->authentication($_POST);
