<?php
function displayKey($key){
    printf(" value = '%s'", $key);
}
function scrambledData($originalData, $key){
    $orginalKey = "abcdefghijklmnopqrstuvwxyz1234567890";
    $data = '';
    $length = strlen($originalData);
    for ($i=0; $i < $length; $i++) { 
        $currentCar = $originalData[$i];
        $position = strpos($orginalKey, $currentCar);
        if ($position !== false) {
            $data .= $key[$position];
        }else{
            $data .= $currentCar;
        }
    }
    return $data;
}
function decodeData($originalData, $key){
    $orginalKey = "abcdefghijklmnopqrstuvwxyz1234567890ABCDEFGHIJKLMNOPQRSTUVWXYZ";
    $data = '';
    $length = strlen($originalData);
    
    for ($i=0; $i < $length; $i++) { 
        $currentCar = $originalData[$i];
        $position = strpos($key, $currentCar);
        if ($position !== false) {
            $data .= $orginalKey[$position];
        }else{
            $data .= $currentCar;
        }
    }
    return $data;
}