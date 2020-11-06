<?php

function getGenderFromName($arr) {
    $arr_name = getPartsFromFullname($arr);
    $gender = 0; 
    if (iconv_substr($arr_name['name'], -1) == 'а' &&
         (iconv_substr($arr_name['surname'], -2) == 'ва') && 
             (iconv_substr($arr_name['patronomyc'], -3) == 'вна'))   {
     $gender = -1;
    }


    elseif (iconv_substr($arr_name['name'], -1) == 'й' || 
              iconv_substr($arr_name['name'], -1) == 'н' &&
               (iconv_substr($arr_name['surname'], -1) == 'в') &&
                  (iconv_substr($arr_name['patronomyc'], -2) == 'ич')) {
$gender = 1;
    }

return $gender;

} 

// $name_sur_patr - имя фамилия отчество