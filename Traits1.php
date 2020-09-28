<?php
trait Drive{
	public function hello(){
		echo 'hello Drive','<br>';
	}
	public function driving(){
		echo 'driving from Drive','<br>';
	}
}

class Person{
	public function hello(){
		echo 'hello Person','<br>';
	}

	public function driving(){
		echo "driving from Person",'<br>';
	}
}

class Student extends Person{
	use Drive;
	public function hello(){
		echo 'hello Student','<br>';
	}
}

$student = new Student();
$student->hello();
$student->driving();