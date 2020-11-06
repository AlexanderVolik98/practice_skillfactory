<?php

function getGenderDescription ($arr) {


function male($var)
{
   return getGenderFromName($var['fullname']) == 1;
}
// мужской род


function female($var)
{
   return getGenderFromName($var['fullname']) == -1;
}
// женский род


function unknown_1($var)
{
   return getGenderFromName($var['fullname']) == 0;
}
// неопределённый


$male = (array_filter($arr, "male"));
$total_male = count($male);

$male = (array_filter($arr, "female"));
$total_female = count($female);

$unknown = (array_filter($arr, 'unknown_1'));
$total_unknown = count($unknown);

$total_gender = $total_unknown + $total_female + $total_male;


function calc_per($numGen, $total) {
$num_per = round($numGen / $total * 100 * 100/100, 1);
return $num_per;
}


$persent_male = calc_per($total_male,$total_gender);

$persent_female = calc_per($total_female,$total_gender);

$persent_unknown = calc_per($total_unknown,$total_gender);


return <<<EOD
гендерный состав аудитории <br>
----------------<br>
мужчины - $persent_male%<br>
женщины - $persent_female%<br>
не определено - $persent_unknown%<br>
EOD;
}







