<?php
class person{
	public  $name;
	public  $gender;
	public function say(){
		echo $this->name," is",$this->gender,'<br>';
	}

	public function __set($name,$value){
		echo "Setting $name to $value <br>";
		$this->$name = $value;
	}

	public function __get($name){
		if(!isset($this->$name)){
			echo '未设置';
			$this->$name = '默认值';
		}
		return $this->$name;
	}

}

$student = new person();
$student->name = 'Tom';
$student->gender = 'male';
$student->age = '24';

//获取对象属性列表
$reflect = new ReflectionObject($student);
$props = $reflect->getProperties();
foreach ($props as $prop) {
	print $prop->getName();
	echo '<br>';
}
echo '<hr>';
//获取对象方法列表
$m = $reflect->getMethods();
foreach ($m as $value) {
	print $value->getName();
	echo '<br>';

}
echo '<hr>';
// var_dump(get_object_vars(($student)));
var_dump(get_class_vars($student));

var_dump(get_class_methods($student));
echo get_class($student);//获取类名

echo '<hr>';
$obj = new ReflectionClass('person');
$className = $obj->getName();
$methods = $properties = array();
foreach ($obj->getProperties() as $v) {
	$properties[$v->getName()] = $v;
}

foreach($obj->getMethods() as $v){
	$methods[$v->getName()] = $v;
}

echo "class{$className} {",'<br>';

is_array($properties)&&ksort($properties);
foreach($properties as $k =>$v){
	echo "<br>";
	echo $v->isPublic() ? 'Public' : '','------>',$v->isPrivate() ? 'private' : '',
	$v->isProtected() ? 'protected' : '',
	$v->isStatic() ? 'static' : '';
	echo "{$k}",'br';
}

echo '<br>';
if(is_array($methods)) ksort($methods);
foreach ($methods as $key => $value) {
	echo "function {$key} () {}",'<br>';
}

echo "}",'<br>';









