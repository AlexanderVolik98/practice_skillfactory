<?php

namespace application\core;
use application\core\view;
use application\models\main;

  
  abstract class controller {

        public $route;
        public $view;
          //переменная для нашего view
    
      


        public function __construct($route)
        {
            $this->route = $route;
         
            $this->view = new view($route);
            $this->model = $this->loadModel($route['controller']);
            //создаем экземпляр класса view и передаем ему нашу переменную с путями - $route, далее мы получим её в конструкторе класса view

          }   
          //  var_dump ($route);
            //сюда мы передали наш текущий action-controller, при вызове родительского класса у нас будет отображаться, какой у нас контроллер и action


        public function loadModel($model) {
          //метод для работы с моделями 
          $path = 'application\models\\'.$model;
          //заменяем слеши для подключения
          if (class_exists($path)) {
          //если такой класс существует, то создаем экземпляр класса этой модели
            return new $path;
          }
          //в переменной храниться путь до нашей модели 
    
        }
            


  }