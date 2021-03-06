<?php

namespace application\core;

class view 
    {


            public $path;

            public $route;

            public $layout = 'default';
          

        public function __construct($route) {

            $this->route = $route; 

            $this->path = $route['controller'].'/'.$route['action'];


                }

                
        public function render($title, $vars = []) {
            extract($vars);


            if (file_exists('application/views/'.$this->path.'.php')) {

            
                ob_start(); 


            require 'application/views/'. $this->path. '.php';
                $content = ob_get_clean();
                require 'application/views/layouts/'. $this->layout.'.php';
                        }  else {
            echo 'вид не найден!';
                    }
          
        } 


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

