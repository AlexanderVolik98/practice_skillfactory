<?php

namespace application\core;
use application\core\view;


  
  abstract class controller {

        public $route;
        public $view;
  

        public function __construct($route)
        {
            $this->route = $route;
         
            $this->view = new view($route);
            $this->model = $this->loadModel($route['controller']);
       

          }   
    

        public function loadModel($model) {
      
          $path = 'application\models\\'.$model;
     
          if (class_exists($path)) {

            return new $path;
          }
    
        }
            


  }