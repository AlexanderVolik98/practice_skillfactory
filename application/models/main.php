<?php
namespace application\models;
use application\core\model;
use application\models\db;
include "application/config/const.php";





class main extends model{

  

  public function upload_image($files) {
      $db = new db;

          $name = $files['image']['name'];
          $tmp_name = $files['image']['tmp_name'];
          $user_add_id = $_COOKIE['user_id'];
        if ($_FILES['files']['size'] > UPLOAD_MAX_SIZE) {
          echo "недопустимый размер файла";
      
        }
        elseif (!in_array($_FILES['image']['type'], ALLOWED_TYPES)) {
          echo "недопустимый формат файла";

        
      
      }
    else {


        move_uploaded_file($tmp_name, "application/lib/uploads/".$name);
        $db->row("INSERT INTO `images` (`id`, `img_name`, `time_add`, `user_add_id`) VALUES (NULL, '$name', NULL, '$user_add_id')");
        header('Location: /');
        
        
      }

    
      
  }

  public function upload_comment ($post) {
    $db = new db;

   $user_add_id = $_COOKIE['user_id'];
   $img_name = $post['img_name'];
   $comment = $post['comment'];


    $img_id = $db->row("SELECT * FROM `images` WHERE `img_name` = '$img_name'");
    $img_id = $img_id[0]['id'];
    

   
   
    $db->query("INSERT INTO `comments` (`id`, `user_id`, `img_id`, `comment`) VALUES (NULL, '$user_add_id', '$img_id', '$comment')");

   


      

    
  
    
    
   
   
  }

  public function output_comment () {
    $db = new db;
    $result = $db->row("SELECT * FROM `comments`");
    var_dump($result);

    
    exit;
   
  }





  public function delete_comment ($post) {
    $db = new db;
    $comment_id = $post['comment_id'];
    $db->query("DELETE FROM comments WHERE id = '$comment_id'");
  }



  public function delete_img ($post) {
    $db = new db;
    $img_id = $post['img_id'];
    $db->query("DELETE FROM images WHERE id = '$img_id'");
    header('Location: /');

  }



}
   




?>