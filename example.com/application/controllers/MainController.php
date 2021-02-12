<?php 


namespace application\controllers;


use application\core\controller;


class MainController extends Controller{


    public function indexAction () {
        $this->view->layout = 'default';
        $this->view->render('главная страница');
        }


    public function contactAction () {
        $this->view->layout = 'default';
        $this->view->render('контакты');
        }

        
    public function aboutUsAction () {
        $this->view->layout = 'default';
        $this->view->render('о нас');
        }


    public function privacyPolicyAction () {
        $this->view->layout = 'default';
        $this->view->render('политика приватности');
        }  

}