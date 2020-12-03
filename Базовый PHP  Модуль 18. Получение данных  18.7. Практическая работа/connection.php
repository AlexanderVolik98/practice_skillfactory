<?php
$connect = @mysqli_connect("127.0.0.1","root","password",'site_gallery_db') or die('нет подключения к базе данных, обратитесь, пожалуйста, к разработчику - admin@info.com');
mysqli_set_charset($connect, "utf8") or die("не установлена кодировка соединения");
// подключение к БД


$imageFileName = $_GET["name"];
$uploadImage = $imageFileName[0];


$commentFilePath = COMMENT_DIR . '/' . $imageFileName . '.txt';


$comment = htmlspecialchars(trim($_POST['comment']));
$email = htmlspecialchars(trim($_POST['email']));
$name = htmlspecialchars(trim($_POST['name_user']));
$image_value = ($_POST['name']);
//переменные для ajax


if ($comment !== '' && $email !== '' && $name !== '' ) {
//отправляем данные в БД при условии, что необходимые поля заполнены (избегаем повторной отправки без редиректа)


  mysqli_query($connect, "INSERT INTO `comments` (`id`, `name`, `email`, `comment`, `comm_picture`) VALUES (NULL, '$name', '$email', '$comment', '$image_value')") or die (mysqli_error($connect));}
//отправка данных 

    
         

        ?>

