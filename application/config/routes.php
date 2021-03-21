<?php 

return
[ 

    '' => [
    'controller' => 'main',
    'action' => 'index'
    ],

    'comments' => [
        'controller' => 'main',
        'action' => 'comments',
    ],





    'create' => [
        'controller' => 'main',
        'action' => 'create',
    ],

    'account/login'  => [
        'controller' => 'account',
        'action' => 'login',
    ],

    'account/registration'  => [
        'controller' => 'account',
        'action' => 'registration',
    ],

    'contacts'  => [
        'controller' => 'main',
        'action' => 'contacts',
    ],

    'aboutus'  => [
        'controller' => 'main',
        'action' => 'aboutus',
    ],

    'privacypolicy'  => [
        'controller' => 'main',
        'action' => 'privacypolicy',
    ],

   'account/exit' => [
       'controller' => 'account',
       'action' => 'exit',
   ]
//это наши роуты

];