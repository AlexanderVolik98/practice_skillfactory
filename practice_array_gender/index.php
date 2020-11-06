<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <title>data_base</title>
</head>
<body>
    

<?php
$example_persons_array = [
  [
      'fullname' => 'Иван Иванов Иванович',
      'job' => 'tester',
  ],
  [
      'fullname' => 'Наталья Степанова Степановна',
      'job' => 'frontend-developer',
  ],
  [
      'fullname' => 'Владимир Пащенко Александрович',
      'job' => 'analyst',
  ],
  [
      'fullname' => 'Александр Громов Иванович',
      'job' => 'fullstack-developer',
  ],
  [
      'fullname' => 'Семён Славин Сергеевич',
      'job' => 'analyst',
  ],
  [
      'fullname' => 'Владимир Цой Антонович',
      'job' => 'frontend-developer',
  ],
  [
      'fullname' => 'Юлия Быстрая Сергеевна',
      'job' => 'PR-manager',
  ],
  [
      'fullname' => 'Антонина Шматко Сергеевна',
      'job' => 'HR-manager',
  ],
  [
      'fullname' => 'Мухаммад аль-Хорезми ибн-Муса',
      'job' => 'analyst',
  ],
  [
      'fullname' => 'Жаклин Бардо Фёдоровна',
      'job' => 'android-developer',
  ],
  [
      'fullname' => 'Арнольд Шварцнегер Густавович',
      'job' => 'babysitter',
  ],
];
//массив значений

 
require "func_getPartsFromFullname.php";
require "func_getFullnameFromParts.php";
require "func_getShortName.php";
require "func_getGenderFromName.php";
require "func_getGenderDescription.php";
//подключенные функции


// var_dump(getPartsFromFullname('Иван Иванов Иванович'));
// вызов функции преобразования строк в массив


// var_dump(getShortName('Иван Иванов Иванович'));
//вызов функции анонимизации клиента


// var_dump(getGenderFromName('Иван Иванов Иванович'));
// функция определения пола

// echo(getGenderDescription($example_persons_array));
// вызов функции вычисления пола в процентном соотношении















































?>


</body>
</html>