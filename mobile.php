<?php
//继承拥有比组合更少的代码量
class car{
	public function addoil(){
		echo 'Add oil';
	}

}

class bmw extends car{//继承

}

class benz{
	public $car;
	public function __construct(){
		$this->car=new car;
	}//组合
	public function addoil(){
		$this->car->addoil();
	}
}

$bmw = new bmw;
echo '<br>';
$bmw->addoil();
echo '<br>';
$benz = new benz();
echo '<br>';
$benz->addoil();
