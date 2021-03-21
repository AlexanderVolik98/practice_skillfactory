<?php

namespace application\controllers;

use application\core\controller;
use application\models\account;



class accountController extends controller {

   


    public function registrationAction() {

        $model_Register = new account;

        if (!empty([$_POST])) {
        $model_Register->reg($_POST);
    }





        $this->view->render('регистрация', $model_Register->reg($_POST));
      

    }




    public function loginAction()  {

        $model_Login = new account;

        if (!empty($_POST)) {
            $model_Login->auth($_POST);
          
              }  
       



        $this->view->render('вход', $model_Login->auth($_POST));

    }



    public function exitAction() {
        $model_Exit = new account;

        $this->view->render('exit');


    }

    




}

    