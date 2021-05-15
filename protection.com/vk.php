<?php
session_start();
include ('App/config/config.php');



if(!$_GET['code']) {
    exit('error_code');
}
/* $token = json_decode(file_get_contents('https://oauth.vk.com/access_token?client_id='.ID.'&redirect_uri='.URL.'&client_secret='.SECRET.'&code='.$_GET['code']), true);
if (!$token) {
 exit('error_token');
} */

$token = json_decode(file_get_contents('https://oauth.vk.com/access_token?client_id='.ID.'&redirect_uri='.URL.'&client_secret='.SECRET.'&code='.$_GET['code']), true);
if (!$token) {
    exit('error token');
}


$data = json_decode(file_get_contents('https://api.vk.com/method/users.get?user_id='.$token['user_id'].'&v=5.52&access_token='.$token['access_token'].'&fields=uid,first_name,last_name&v=5.52'), true);
if (!$data) {
    exit('error data');
}
$access_token = $token['access_token'];

$_SESSION['token'] = $access_token;
$_SESSION['user_role'] = 'user_VK';


header('Location: /');

/* 
$token = json_decode(file_get_contents('https://api.vk.com/method/users.get?user_id=210700286&v=5.52'), true);

if (!$token) {
    exit('error token');
} */




?>