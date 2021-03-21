

<?php 
       setcookie('user', $result[0]['username'], time() - 3600, "/");
       setcookie('user_id', $result[0]['username'], time() - 3600, "/");
       

       header('Location: /');
       
?>