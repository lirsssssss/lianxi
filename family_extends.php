<?php
class person{
	public $name = 'Tom';
	public $gender;
	static $money = 10000;
	public function __construct(){
		echo '这是父类','<br>';
	}
	public function say(){
		echo $this->name,"\tis",$this->gender,'<br>';
	}

}

class family extends person{
	public $name;
	public $gender;
	public $age;
	static $money = 100001;
	public function __construct(){
		parent::__construct();//d调用继承的父类方法
		echo '这是person的子类','<br>';
	}

	public function say(){
		parent::say();
		echo $this->name,'is',$this->gender,',and is',$this->age,'<br>';
	}
	public function cry(){
		echo parent::$money,'<br>';
		echo '0.0','<br>';
		echo self::$money,'<br>';//调用自身方法
		echo '^.^';
	}
}

$poor = new family();//创建一对象调用构造方法
$poor->name = 'Lee';//类成员赋值
$poor->gender = 'female';
$poor->age = 25;
$poor->say();//调用类方法和继承的父类
$poor->cry();//调用类方法和继承的父类