  <?php 

  include "application/lib/dev.php";
use application\core\router;
use application\models\db; 
//здесь мы задаем то, что используем, какие классы подключаем

spl_autoload_register(function($class) {
  //эта функция будет при выполнении кода смотреть, есть ли в нашем файле классы, которые можно подключить, если такие есть, то они будут подключены и обработаны при помощи следующей функции...


  $path = str_replace('\\', '/', $class.'.php');
  //меняем слеши на обычные вместо обратных, создаем переменную с путем для подключения классов


  if (file_exists($path)) {
    //если такой файл по данному пути у нас существует, то он будет подключен


    require $path;
    //подключение нужного класса, в переменной находится путь до нашего файла
  }
});


//session_start();
  $b = new router;


  $d = new db;



$b->run();

