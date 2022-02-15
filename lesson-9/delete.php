<?php
$array  = [1,1,1,2,6,89,543,2];
function LinearSearch ($myArray, $num) {
    $count = count($myArray);

    for ($i=0; $i < $count; $i++) {
     if ($myArray[$i] == $num)
     {
        unset($myArray[$i]);
     }
    }
    print_r($myArray);
 }
LinearSearch($array,2).PHP_EOL;