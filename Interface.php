<?php
interface employee{
	public function working();
}

class teacher implements employee{
	public function working(){
		echo 'book';
	}
}

class coder implements employee{
	public function working(){
		echo 'coding';
	}
}

function doprint(employee $i){
	$i->working();
}

$a = new teacher;
$b = new coder;
echo '<hr>';
doprint($a);
echo '<br>';
doprint($b);