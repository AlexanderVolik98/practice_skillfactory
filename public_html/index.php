<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <title>data_base</title>
</head>
<body>
    





<?php
$example_persons_array = [
  [
      'fullname' => 'Иванов Иван Иванович',
      'job' => 'tester',
  ],
  [
      'fullname' => 'Степанова Наталья Степановна',
      'job' => 'frontend-developer',
  ],
  [
      'fullname' => 'Пащенко Владимир Александрович',
      'job' => 'analyst',
  ],
  [
      'fullname' => 'Громов Александр Иванович',
      'job' => 'fullstack-developer',
  ],
  [
      'fullname' => 'Славин Семён Сергеевич',
      'job' => 'analyst',
  ],
  [
      'fullname' => 'Цой Владимир Антонович',
      'job' => 'frontend-developer',
  ],
  [
      'fullname' => 'Быстрая Юлия Сергеевна',
      'job' => 'PR-manager',
  ],
  [
      'fullname' => 'Шматко Антонина Сергеевна',
      'job' => 'HR-manager',
  ],
  [
      'fullname' => 'аль-Хорезми Мухаммад ибн-Муса',
      'job' => 'analyst',
  ],
  [
      'fullname' => 'Бардо Жаклин Фёдоровна',
      'job' => 'android-developer',
  ],
  [
      'fullname' => 'Шварцнегер Арнольд Густавович',
      'job' => 'babysitter',
  ],
];
//массив значений


require "func_getPartsFromFullname.php";
require "func_getFullnameFromParts.php";
require "func_getShortName.php";

//подключенные функции

// echo getFullnameFromParts("Александр","Волик","Игоревич");
// вызов функции слияния строк


// var_dump(getPartsFromFullname('Александр Волик Игоревич'));
// вызов функции преобразования строк в массив


var_dump(getShortName('Александр Волик Игоревич'));

//вызов функции анонимизации клиента







































?>


</body>
</html>

















