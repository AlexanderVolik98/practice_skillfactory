<?php

namespace application\core;
use application\core\view;
class router {



    protected $routes = [];
    protected $params = [];


function __construct()
    {
      $arr = require 'application/config/routes.php';
   

     foreach ($arr as $key => $val) {
   
        $this->add($key, $val);
   
     }
     
    }


    public function add($route, $params) {

$route = '#^'. $route.'$#';

$this->routes[$route] = $params;



    }












    public function match() {
$url = trim($_SERVER['REQUEST_URI'], '/');
// в переменную записываем текущее значение url - адресной строки, при помощи trim отрезаем в начале слеш так как сравнивать мы будем с регулярными выражениями без слеша в начале


foreach ($this->routes as $route => $params) {
  
//далее мы перебираем наш массив с путями, которые мы добавили в предыдущем методе add
    if (preg_match($route, $url, $matches)) { 
    //здесь при помощи функции мы сравниваем, совпадает ли текущий url с регулярным выражением
       
    //echo 'совпадения найдены!'; 
    //далее вводим в адресную строку наш запрос, он его сверяет с нашим массивом в routes.php, если такой адрес найден, то выполнение кода продолжается
    //в переменной matches хранится информация, что именно было найдено

    $this->params = $params;
    //записываем передаваемые параметры в наш массив 
    return true;

        } 
    }
}

//метод будет проверять, есть ли такой маршрут








    public function run() {
        if ($this->match()) {
       



            $path = 'application\controllers\\'.$this->params['controller'].'Controller';
            //если if сработал, то в эту переменную мы добавляем путь до нашего контроллера (берем просто название controller'a указанного в переменной этот путь будет нас вести до контроллера конкретной страницы, и, если такая существует, то мы в будущем её подключим)
            
            //application\controllers\accountController.php
            

            if (class_exists($path)) {
                $action = $this->params['action'] . 'Action';
                //эта переменная содержит в себе название нашего action'a - конкретной страницы
               // echo $action;
                if (method_exists($path, $action)) {
            //проверяем существует ли наш $path (controller) и $action (action)
            $controller = new $path($this->params);
            //в переменной path содержится наш класс
            $controller->$action();
            //в наш новый объект передаем action
                }
                else {
                    View::errorCode(404);
                }

            }
            else {
                View::errorCode(402);
            }
         
        }
        else {
            View::errorCode(403);
        }
    }
}
//