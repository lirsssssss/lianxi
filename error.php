<?php
error_reporting(0);//屏蔽错误
$data = '2012-12-20';
if(ereg("([0-9]{4}) - ([0-9]{1,2}) - {[0-9]{1,2}}",$data,$regs)){
	echo "$regs[3].$regs[2].$regs[1]";
}else{
	echo "Invalid date format:$data";
}

if($i>5){
	echo '$没有初始化',PHP_EOL;
}
$a = array('o'=>2,3,4,5,6);
echo $a[o];
$result = array_sum($a,3);
echo fun();
echo "致命错误 后不会执行";

error_reporting(0);







