<?php


function getPartsFromFullname ($name_sur_patr) {
$arr_name = explode(" ", $name_sur_patr );

$keys = ['name', 'surname', 'patronomyc'];


$arr_comb = array_combine($keys, $arr_name);

return $arr_comb;

}











// foreach ($arr_name as $key => $value) {
//   for ($i=0; $i < count($arr_name); $i++) { 
//     if ($arr_name[$i] == 0) {
//       $new_arr['name'];
//     } 
//     elseif ($arr_name[$i] == 1) {
//       $new_arr['surname'];
//     }
//     else {
//       $new_arr['patronomyc'];
//     }
//   }
// }
// return $new_arr;







// $keys = ['name','surname','patronomyc']; 

// foreach ($arr_name as $key => $value) {
//   for ($i=0; $i < ; $i++) { 
//    $new_arr = array_fill_keys($keys[$i], $arr_name[$i]);
//   }
// }

// return $new_arr;