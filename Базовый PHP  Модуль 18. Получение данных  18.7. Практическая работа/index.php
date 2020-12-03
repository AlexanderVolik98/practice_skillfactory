
<?php
require_once 'connection.php';
// подключаемся к БД
include ('config.php');


$errors = [];
$messages = [];


 ($_GET);

// подключаем конфиг
$filename111 = ($_FILES['files']['name']);
$filename222 = $filename111[0];
  ($filename222);

 ($imageFileName);
// Если файл был отправлен
if (!empty($_FILES)) {

    // Проходим в цикле по файлам
    for ($i = 0; $i < count($_FILES['files']['name']); $i++) {
// цикл, проходим до тех пор, пока элементы массива не закончатся

        $fileName = $_FILES['files']['name'][$i];
// подставляем значения для проверки


        // Проверяем размер
        if ($_FILES['files']['size'][$i] > UPLOAD_MAX_SIZE) {
            $errors[] = 'Недопустимый размер файла ' . $fileName;
            echo $errors[0];
            continue;
        }

        // Проверяем формат
        if (!in_array($_FILES['files']['type'][$i], ALLOWED_TYPES))
        // в этом условии мы при помощи in_array проверяем, ЕСТЬ ЛИ В МАССИВЕ ЗНАЧЕНИЕ КОНСТАНЫ, то есть есть ли нужное расширение для картинки, если в этом массиве не находится данное расширение,
        // значит такой файл не подходит
        {
            $errors[] = 'Недопустимый формат файла ' . $fileName;
            continue;
        }
    
        $filePath = UPLOAD_DIR . '/' . basename($fileName);

        // Пытаемся загрузить файл
        if (!move_uploaded_file($_FILES['files']['tmp_name'][$i], $filePath)) {
          
            $errors[] = 'Ошибка загрузки файла ' . $fileName;



            continue;
        }
    }

    if (empty($errors)) {


        $messages[] = 'Файлы были загружены';
     
    }

}


// Если файл был удален
if (!empty($_POST['name'])) {

    $filePath = UPLOAD_DIR . '/' . $_POST['name'];
    $commentPath = COMMENT_DIR . '/' . $_POST['name'] . '.txt';

    // Удаляем изображение
    unlink($filePath);

    // Удаляем файл комментариев, если он существует
    if(file_exists($commentPath)) {
        unlink($commentPath);
    }

    $messages[] = 'Файл был удален';
}

// Получаем список файлов, исключаем системные
$files = scandir(UPLOAD_DIR);
$files = array_filter($files, function ($file) {
    return !in_array($file, ['.', '..', '.gitkeep']);
});


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



    <title>Галерея изображений | Список файлов</title>
</head>
<body>



<div class = 'page'>





<!-- навигационная панель -->
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


<div class="container pt-4">
  
<h2>Список файлов</h2>
    <!-- Вывод сообщений об успехе/ошибке -->
  
  

    <!-- Вывод изображений -->
    <div class="mb-4">
        <?php if (!empty($files)): ?>
            <div class="row">
                <?php foreach ($files as $file): ?>

                    <div class="col-12 col-sm-3 mb-4">
                        <form method="post">
                            <input type="hidden" name="name" value="<?php echo $file; ?>">
                            <button type="submit" class="close" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </form>
                        <a href="<?php echo URL . '/file.php?name=' . $file; ?>" title="Просмотр полного изображения">
                            <img src="<?php echo URL . '/' . UPLOAD_DIR . '/' . $file ?>" class="img-thumbnail"
                                 alt="<?php echo $file; ?>">
                        </a>
                    </div>
 
                <?php endforeach; ?>
            </div><!-- /.row -->
        <?php else: ?>
            <div class="alert alert-secondary">Нет загруженных изображений</div>
        <?php endif; ?>
    </div>


    <!-- Форма загрузки файлов -->
    <form method="post" action = '#' enctype="multipart/form-data">
        <div class="custom-file">
            <input type="file" class="custom-file-input" name="files[]" id="customFile" multiple required>
            <label class="custom-file-label" for="customFile" data-browse="Выбрать">Выберите файлы</label>
            <small class="form-text text-muted">



                Максимальный размер файла: <?php echo UPLOAD_MAX_SIZE / 1000000; ?>Мб.
                Допустимые форматы: <?php echo implode(', ', ALLOWED_TYPES) ?>.
            </small>
        </div>
        <hr>

        <?php foreach ($errors as $error): ?>
        <div class="alert alert-danger"><?php echo $error; ?></div>
    <?php endforeach; ?>

    <?php foreach ($messages as $message): ?>
        <div class="alert alert-success"><?php echo $message; ?></div>
    <?php endforeach; ?>

        <button type="submit" class="btn btn-danger">Загрузить</button>
    </form>
    
</div><!-- /.container -->

<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
        integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n"
        crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo"
        crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
        integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6"
        crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bs-custom-file-input@1.3.4/dist/bs-custom-file-input.min.js"></script>
<script>
    $(() => {
        bsCustomFileInput.init();
    });
</script>



</div>




</body>
</html>
