<?php
// $arr = array('name'=>'Li','gender'=>'male');
// echo "\n";
// echo serialize($arr);

class person{
	public $name;
	public $gender;
	public function say(){
		echo $this->name,"\tis",$this->gender,"<br>";
	}
}

class family{
	public $people;
	public $location;
	public function __construct($p,$loc){
		$this->people   = $p;
		$this->location = $loc; 
	}
}

class gz{
	public $ad;
	public function __construct(){
		$this->ad = '构造';
	}

	public function __destruct(){
		$this->ad = '析构函数';
	}
}
$student = new person();
$student->name  = 'Hongfei';
$student->gender = 'male';
$student->say();

$tom = new family($student,'peking');
echo "<pre>";
echo serialize($student);
$student_arr = array('name'=>'Tom','gender'=>'woman');
echo "<br>";
echo serialize($student_arr);
echo "<br>";

print_r($tom);
echo "<br>";
echo serialize($tom);
echo "<br>";

$gz = new gz();


var_dump($gz);



















