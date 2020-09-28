<?php

$array = ['value1','value2','value3','value4'];
$outerObj = new OuterTmp(new ArrayIterator($array));
foreach ($outerObj as $key=>$value){
    echo "++".$key . " - " . $value . "\n";
}

