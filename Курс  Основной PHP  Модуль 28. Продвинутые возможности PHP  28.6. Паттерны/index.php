<?php
$arr_file = file('file.txt');

//echo (count($arr_file));
$keyword = "meta name=\"keywords\"";
$description = "meta name=\"description\"";


foreach ($arr_file as $k => $value) {
  if ((strpos($value, $keyword)) || (strpos($value, $description))) {
      echo $k;
      echo $value;
      unset($arr_file[$k]);
   
      $str = implode('', $arr_file) . '';
      var_dump($str);
file_put_contents('file.txt', $str);

  }

 

}






?>