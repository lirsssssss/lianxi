<?php
header("Content-type:text/html; charset=utf-8");

function customError($errno,$errsrt,$errfile,$errline){
	echo "<b>错误代码: </b>[${errno}] ${errstr}",'<br>';
	echo "错误所在的代码行:{$errline} 文件{$errstr}",'<br>';
	echo "PHP 版本",PHP_VERSION,"(",PHP_OS,")",'<br>';
}

set_error_handler("customError",E_ALL|E_STRICT);
$a = array('o'=>2,3,4,5);
echo $a[o];

