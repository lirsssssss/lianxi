<?php
//面向对象练习 1.1.0
class person
{
	public $name;//定义类成员
	public $gender;//类成员
	//定义类方法
	public function say(){
		echo $this->name,' is ',$this->gender;
	}

}

//实例化人
$student = new person();
$student->name   = 'Hongfei';//姓名
$student->gender = 'male';//性别 
$student->say();//实例化人名方法

echo '<br>';

$teacher = new person();
$teacher->name   = 'Kteacher';
$teacher->gender = 'female';
$teacher->say();
echo '<br>';
print_r((array) $student);
echo '<br>';
var_dump($student);

//将对象序列化
$arr = serialize($student);
echo '<br>',$arr;
//将序列化的$arr 存到本地文
file_put_contents('student.txt',$arr);

echo '<br>';
//从本地文件读取文件
$arr = file_get_contents('student.txt');
$str = unserialize($arr);//将读取的文件反序列化
$str->say();
