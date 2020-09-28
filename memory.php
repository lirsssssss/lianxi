<?php
//获取这段代码占用的内存
$men = memory_get_usage();
$test = array();
for ($i=0; $i <= 200000; $i++) { 
	$test[$i] = $i;
}

echo memory_get_usage() - $men, " bytes \n";

$men = memory_get_usage();
$test1 = array();
for ($i=200000; $i >= 0; $i--) { 
	$test1[$i] = $i;
}

echo memory_get_usage() - $men, " bytes \n";