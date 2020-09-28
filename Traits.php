<?php
trait Drivre{
	public $carName ='trait';
	public function driving(){
		echo "driving,{$this->carName}";
	}
}

class Person{
	public function eat(){
		echo  'eat','<br>';
	}
}

class Student extends Person{
	use Drivre;
	public function study(){
		echo 'study','<br>';
	}
}

$student = new Student();
$student->study();
$student->eat();
$student->driving();

trait Leix{
	public function __construct(){
		echo 'trait ';
	}

}


class Duix{
	use Leix;
	public function __construct(){
		echo 'Duix';
	}
}
echo '<hr>';
$duix = new Duix();
