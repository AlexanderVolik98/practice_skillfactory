<?php



function getShortName($name_sur_patr) {
    $new_arr = getPartsFromFullname($name_sur_patr);
    $b = mb_substr($new_arr['surname'], 0, 1);
    return $b;
// return $new_arr['name'] . " " . mb_substr($new_arr['surname'], 0, 1) .'.';


}

