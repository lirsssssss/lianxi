<?php
class Employee{
	protected function working(){
		echo '本方法需要重载才能运行';
	}
}

class Tracher extends Employee{
	public function working(){
		echo "书本";
	}
}

class Coder extends Employee{
	public function working(){
		echo '代码';
	}
	function say(){
		echo '123';
	}
}

function doprint($obj){
	if(get_class($obj) == 'Employee'){//get_class 返回对象的类名
		echo 'Error';
	}else{
		$obj->working();
	}
}
doprint(new Tracher());
doprint(new Coder());
doprint(new Employee());
$Coder = new Coder();
$Coder->say();