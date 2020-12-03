<?php
require_once 'connection.php';
// подключаемся к БД
include ("config.php");
// подключаем именованные константы


 $result_comment = mysqli_query($connect, "SELECT * FROM `comments`");
 $result_comment = mysqli_fetch_all( $result_comment);
//делаем запрос в БД чтобы получить массив комментариев


?>
<!doctype html>
<html lang="en">
<head>

    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
          integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

        
          <link rel="stylesheet" href="style/style.css">
<!--подключение стилей (моё)  -->

<link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Balsamiq+Sans&display=swap" rel="stylesheet">
<!-- подключение шрифтов (моё) -->


<title>Галерея изображений | Файл <?php echo $imageFileName; ?></title>
</head>
<body>


<div class ="page">


<nav class="navbar-fixed-top navbar navbar-expand-lg navbar-inverse bg-dark">
<a class="navbar-brand" href="<?php echo URL; ?>" class='active'> <img alt="Brand" src="style/practice_php.jpg" width="100" height="80"></a>
 
 
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <button class="btn btn-danger" data-toggle="modal" data-target="#mymodal">контакты разработчика</button>
        <div id="mymodal" class="modal fade">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button class="close" data-dismiss ='modal'>x</button>

              
              </div>

  
 <div class="modal-body"> 
   
  <h4 class="text-center"> как со мной связаться</h4>  
   мой телефон: +7(999) 999 99 99 <br> email: laughing_man@info.com</div>
            </div>
          </div>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="https://github.com/AlexanderVolik98">ссылка на github</a>
    </ul>
    
  </div>
</nav>
<!-- навигационная панель -->


<div class="container ">
<div class="row">
<div class="col-lg-12">


    <!-- Вывод сообщений об успехе/ошибке -->
    <h2 class="mb-4">Файл <?php echo $imageFileName; ?></h2>


            <img src="<?php echo URL . '/' . UPLOAD_DIR . '/' . $imageFileName ?>" class="img-thumbnail mb-4"
                 alt="<?php echo $imageFileName ?>">

           <h3>Комментарии</h3>
            <?php if(!empty($comments)): ?>
                <?php foreach ($comments as $key => $comment): ?>
                    <p class="<?php echo (($key % 2) > 0) ? 'bg-light' : ''; ?>"><?php echo $comment; ?></p>
                    
                <?php endforeach;  $b = '';?>
           
            <?php endif; 
            
            
            ?>
  <?php foreach ($errors as $error): ?>
    <!-- Вывод сообщений об успехе/ошибке -->


    <!-- сообщение о статусе отправки комментария -->
        <div class="alert alert-danger"><?php echo $error; ?></div>
    <?php endforeach; ?>

    <?php foreach ($messages as $message): ?>
        <div class="alert alert-success"><?php echo $message; ?></div>
    <?php endforeach; ?>
    <!-- сообщение о статусе отправки комментария -->


        <form onsubmit="return false;" method="POST">


<div class="row">


            <div class="form-group col-6">
                    <label for="comment"> Ваше имя</label>
                    <input class="form-control" id="name" name="name_user" rows="3"  placeholder="type here" required> </input>
                    <small id="about_name" class="form-text text-muted">очень приятно!</small>
                    </div>
                <!-- имя  -->


               <div class="form-group col-6">
                    <label for="comment">Ваша почта</label>
                    <input class="form-control" id="email" name="email" rows="3"  placeholder="type here"required> </input>
                    <small id="emailHelp" class="form-text text-muted">нигде не используем</small>
                </div>
                <!-- почта  -->


                </div>
                <div class="form-group col-13">
                    <label for="comment">Ваш комментарий</label>
                    <textarea class="form-control" id="comment" name="comment" rows="3" placeholder="type here"required></textarea>
                    <small id="about_comment" class="form-text text-muted">оффтоп запрещён</small>
                </div>
                <!-- комментарий -->


                <div class="form-check">
                    <input type="checkbox" class="checkme" name='test' id="agree">
                    <label class="form-check-label"><a href="http://www.stinfa.ru/?id=50250">ознакомлен с правилами хорошего тона</a></label>
                </div>
  <!-- чекбокс принятия условий -->


  <?php echo '<input type="hidden" name="image_name" id = "image_name" class="image_name" value="'.  $imageFileName .'">'; ?>
 <!-- используем скрытый инпут для того чтобы отправить, к какой именно картинке пользователь оставляет комментарий -->


  <div id="messageError" ></div>
    <div id="messageSuccess" ></div>
<!-- объявляем тэги для отображения успеха или ошибки -->


                <hr>
                <div class="form-group text-right"></div>
                <button type="submit" name='test' id="continue"  class="btn btn-danger">add comment</button>
<!-- кнопка добавления комментария -->
                

                </form>


<?php


 foreach ( $result_comment as $res) {
   if ($res[0] == $imageFileName) {
// с помощью условия и переменной мы узнаем, соответствует ли каждый из комментариев текущей картинке, если нет, то скрипт не выполняется и перебор массива происходит дальше
  ?>


  <strong>автор: <?= $res[2] ?></strong>
<p><?= $res[4] ?></p>
<small> опубликовано <?= $res[5]?>  </small>
<hr>
<!-- выводим полученные комментарии -->


<?php
  }
}

?>


<!-- подключаем аджакс -->
                <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js"></script>
<!-- подключаем аджакс -->

</div>


    </div>




<script>


$(document).ready (function() {

  $('button').on('click', function() {

  
   var emailValue =  $('input#email').val();
   var commentValue =  $('textarea#comment').val();
   var nameValue =  $('input#name').val();
   var pictureValue = $('input#image_name').val();
// создаём переменные и присваиваем им значения инпутов


//    console.log (nameValue)
//    console.log (emailValue)
//    console.log (commentValue)
//    console.log (pictureValue)


   var fail = '';
  var success = 'комментарий успешно отправлен';

   if (!emailValue || !nameValue || !commentValue) {
  fail = 'заполните, пожалуйста, все поля выше'
} 
  
else if (emailValue.split ('@').length - 1 == 0 || emailValue.split ('.').length - 1 == 0) {
     fail = 'вы ввели некорректный email'
}

else if (nameValue.length < 3) {


fail = "имя не меньше 3 символов";
}
   //задаем условия при которых форма будет отправлена


   if (fail !== '') {
     $('#messageError').html (fail + "")

     $('messageError').show ();
     return false;
    }
     else {
      $('#messageError').hide();
     $('#messageSuccess').html (success);

    

        $.ajax({
        method: "POST",
        url: "config.php",
        data:  {name_user:nameValue, email:emailValue, comment: commentValue, name:pictureValue},

      })

      .done(function() {
          $('input#name').val('');
          $('input#email').val('');
          $('textarea#comment').val('');
          $('input#image_name').val('');
     //очищаем формы при успешной отправке
      })


  
    }
  })
});


</script>


<script type="text/javascript">
$(document).ready(function(){

  $('#continue').prop('disabled', true);

  $('#agree').change(function() {

      $('#continue').prop('disabled', function(i, val) {
        return !val;
      })
  });
})
</script>
<!-- деактивация кнопки без нажатого чекбокса -->

          
        </div>
    </div>

</div>


<script src="jquery/jquery.js"> </script>

<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo"
        crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
        integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6"
        crossorigin="anonymous"></script>


<script> 
  $(document).ready(function() {
 $('#continue').on('click', function () {

 })
  });

 
</script>



        </div>

<style>
    .page {
        margin-bottom: 30px;
    }
</style>



</body>
</html>

