<?php

namespace application\controllers;
use application\models\db;
use application\core\controller;
use application\models\main;

class mainController extends controller {



    public function indexAction() {
        $model_upload = new main;
        $db = new db;

        
   

        
     

        
        if (!empty($_FILES)) {


            $model_upload->upload_image($_FILES);
            
            }


       


                if(!empty($_POST)) {

                    $model_upload->delete_img($_POST);
                    }
    
                    
  
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




    public function commentsAction() {
        $model_upload = new main;

        $this->view->render('комментарии');
      

        if(!empty($_POST)) {

            $model_upload->upload_comment($_POST);
            $model_upload->delete_comment($_POST);
            }

         

            
        //теперь мы можем вызывать различные модели/виды для различных страниц при помощи контроллера
    }



}