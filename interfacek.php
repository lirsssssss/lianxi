<?php
interface mobile{
	public function run();//驱动方法
}

class plain implements mobile{
	public function run(){
		echo 'is aircraft';
	}

	public function fly(){
		echo 'filght';
	}
}


class car implements mobile{
	public function run(){
		echo 'is automobile';
	}
	// public function fly(){
	// 	echo 'run away';
	// }
}

class machine{
	function demo(mobile $a){
		$a->fly(); //mobile接口是没有这个方法的
	}
}

$obj = new machine();
$obj->demo(new plain());
echo '<hr>';
$obj->demo(new car());