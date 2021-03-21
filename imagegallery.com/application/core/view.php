<?php

namespace application\core;

class view 
    {

            public $path;
            //путь к нашему виду, то что получили из $route конкатенируем и получаем значение controller/action

            public $route;
            //получаем из контроллера наш action и controller

            public $layout = 'default';
            //наш шаблон



        public function __construct($route) {

            $this->route = $route; 
            //записываем полученные данные из controller


            $this->path = $route['controller'].'/'.$route['action'];
            //записываем значения о пути


            //echo $this->path;
            //var_dump ($route);
            //мы получили переменную $route когда вызвали класс в controller, теперь мы можем с ней работать
            //array (size=2)
            //'controller' => string 'account' (length=7)
            //'action' => string 'login' (length=5)


                }

                

        public function render($title, $vars = []) {
            extract($vars);
            //здесь мы экстрактим наш ассоциативный массив на переменные и значения

            if (file_exists('application/views/'.$this->path.'.php')) {

            
                ob_start(); 


            require 'application/views/'. $this->path. '.php';
                $content = ob_get_clean();
                require 'application/views/layouts/'. $this->layout.'.php';
                        }  else {
            echo 'вид не найден!';
                    }
                //подключаем наш шаблон, в переменной указываем название шаблона

        } 

   //     public function redirect($url) {
     //       header('location: '.$url);
       //     exit;
        // }

        public static function errorCode($error) {
            http_response_code($error);
            require 'application/views/errors/'.$error.'.php';
            exit;
        }

        public function message ($status, $message) {
            exit(json_encode(['status' => $status, 'message' => $message]));
        }

        public function location ($url) {
            exit(json_encode(['url' => $url]));
        }

    }

