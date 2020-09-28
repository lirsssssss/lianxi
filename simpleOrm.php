<?php
//PHP面向对象代码ORM模型 1-3
//abstract 定义抽象类 抽象类不能被实例化
abstract class ActiveRecord{
	protected static $table;
	protected $fieldvalues;
	public $select;

	static function findById($id){
		$query = "select * from ".static::$table." where id = $id";

		return self::createDomain($query);

	}

	function __get($fieldname){
		return $this->fieldvalues[$fieldname];
	}

	static function __callStatic($method,$args){
		$field = preg_replace('/^findBy(\w*)$/','${1}',$method);
		$query = "select * from ".static::$table." where $field = '$args[0]'";
		return self::createDomain($query);
	}

	private static function createDomain($query){
		$klass = get_called_class();
		$domain = new $klass();
		$domain->fieldvalues = array();
		
		$domain->select = $query;
		foreach($klass::$fields as $field => $type){
			$domain ->fieldvalues[$field] = 'TODO: set from sql result';
		}
		return $domain;
	}

}

class Customer extends ActiveRecord{
	protected static $table = 'custdb';
	protected static $fields = array('id'=>'int','email'=>'varchar','lastname'=>'varchar');

}

class Sales extends ActiveRecord{
	protected static $table = 'salesdb';
	protected static $fields = array('id'=>'int','item'=>'varchar','qty'=>'int');
}


var_dump(Customer::findById(123)->select);
echo '<br>';
var_dump(Customer::findById(123)->email);
echo '<br>';
var_dump(Sales::findById(321)->select);
echo '<br>';
var_dump(Customer::findByLastname('Denoncourt')->select);
echo '<HR>';

var_dump("select * from custdb where id = 123" == Customer::findById(123)->select);
var_dump("TODO: set from sql result" == Customer::findById(123)->email);
var_dump("select * from salesdb where id = 321" == Sales::findById(321)->select);
var_dump("select * from custdb where Lastname = 'Denoncourt'" == Customer::findByLastname('Denoncourt')->select);



















