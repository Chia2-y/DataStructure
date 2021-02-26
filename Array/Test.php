<?php
require_once 'SimpleArray.php';

$arrClass = new SimpleArray(10);

for($i = 0;$i < 9;$i++){
    $arrClass->insert($i,$i+1);
}
$arrClass->dd();

$code = $arrClass->insert(7,999999);
echo "Insert at 7: code:{$code}".PHP_EOL;
$arrClass->dd();

list($code,$value) = $arrClass->delete(7,999999);
echo "Delete at 7: code:{$code};value:{$value}".PHP_EOL;
$arrClass->dd();

$code = $arrClass->insert(11, 999);
echo "Insert at 11: code:{$code}".PHP_EOL;

list($code,$value) = $arrClass->find(7);
echo "Find at 7: code:{$code};value:{$value}".PHP_EOL;
