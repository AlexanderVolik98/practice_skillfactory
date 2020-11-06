<?php

function getShortName($name_sur_patr) {
    $new_arr = getPartsFromFullname($name_sur_patr);
    $b = iconv_substr ($new_arr['surname'], 0, 1, "UTF-8");
   // return $b;
 return $new_arr['name'] . " " . iconv_substr($new_arr['surname'], 0, 1, "UTF-8") .'.';
}