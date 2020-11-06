<?php


function getPartsFromFullname ($name_sur_patr) {
$arr_name = explode(" ", $name_sur_patr );

$keys = ['name', 'surname', 'patronomyc'];


$arr_comb = array_combine($keys, $arr_name);

return $arr_comb;

}


