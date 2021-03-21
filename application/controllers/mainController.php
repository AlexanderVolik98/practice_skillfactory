<?php

namespace application\controllers;
use application\models\db;
use application\core\controller;
use application\models\main;

class mainController extends controller {

     


    public function indexAction() {

    
    
    
        $db = new db;

    
  
        $this->view->render('главная страница');
         
    }

    public function contactsAction() {

        $this->view->render('контакты');
 
    }

    public function privacypolicyAction() {
        $this->view->render('политика конфиденциальности');

    }

    public function aboutusAction() {

        $this->view->render('о нас');

    }


    public function createAction() {
   



        $this->view->render('upload');

    }


    public function commentsAction() {
      

        $this->view->render('комментарии');
      
        
        //теперь мы можем вызывать различные модели/виды для различных страниц при помощи контроллера
    }



}