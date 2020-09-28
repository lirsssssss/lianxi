<?php
class Account{
	private $user = 1;
	private $pwd  = 2;
	public function __set($names,$value){
		echo "Setting $names to $value";
	}

	public function __get($name){
		if(!isset($this->$name)){
			echo '未设置';
			$this->name = '正在为你设置默认值';
		}
		// return $this->$name;
	}
}
$a = new Account();
echo $a->user;
$a->name = 5;
echo '<pre>';
echo $a->name;
echo '<pre>';
echo $a->big;

echo '<hr>';

function call($arguments){
	switch (count($arguments)){
		case 2:
			echo $arguments[0] * $arguments[1],PHP_EOL;
			break;
		case 3:
			echo array_sum($arguments),PHP_EOL;
			break;
		default:
			echo '参数错误',PHP_EOL;
			break;
	}
}

echo call(1),'<br>';
echo call(['6','2']);
