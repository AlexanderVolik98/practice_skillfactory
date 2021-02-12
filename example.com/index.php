<?php





require 'application/lib/dev.php';
//подключаем наш файл с конфигом для вывода ошибок и нотисов, теперь в функцию debug у нас помещена функция отображения содержимого 


use application\core\Router;
//используем классы из роутера при помощи use, теперь нам не нужно прописывать путь до класса при его объявлении из route



spl_autoload_register(function($class) {
    $path = str_replace('\\', '/', $class.'.php');
    if (file_exists($path)) {
        require $path;
    }
});

$router = new Router;
//создаем экземпляр нашего класса 


$router->run();
//запускаем роутер  


?>