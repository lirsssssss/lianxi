<?php
interface Db_Adapter{
	/*
	*数据库连接
	*@param $config数据库配置
	*return resource
	*/ 

	public function connect($config);
	/*
	*执行数据查询
	*@param string $ query 数据库查询sql字符串
	*@param mined $handle连接对象
	*@return resource
	*/ 
	public function query($query,$handle);
}


class Db_Adapter_Mysql implements Db_Adapter
{
	private $_dbLink;//数据库练级字符串标识
	/*
	*数据库连接函数
	*$config 数据库配置
	*throws Db_Excetion
	*return resource
	**/ 

	public function connect($config){
		if($this->_dbLink=@mysql_connect($config->host.(empty($config->port)?' ' :': '.$config->port),$config->user,$config->password,true)){
			if(@mysql_select_db($config->database,$this->_dbLink)){
				if($config->charset){
					mysql_query("SET NAMES ' {$config->charset} '",$this->_dbLink);
				}
				return $this->_dbLink;
			}
		}
		//数据库异常
		throw new Db_Exception(@mysql_error($this->_dbLink));
	}

	/*
	*执行数据库查询
	*@param string $query数据库查询sql字符串
	*@param mixed $handle 连接对象
	%@return resource
	*/ 
	public function query($query,$handle){
		if($resource=@mysql_query($query,$handle)){
			return $resource;
		}
	}
}

class Db_Adapter_Sqlite implements Db_Adapter
{
	private $_dbLink;//数据库连接字符串标识
	/*
	*数据库连接函数
	*param $config 数据库配置
	*@throws Db_Exception
	*@return resource
	*/ 
	public function __construct(){
		echo '213';
	}


	public function connect($config){
		if($this->_dbLink=sqlit_open($config->file,0666,$error)){
			return $this->_dbLink;
		}

		//数据库异常
		throw new Db_Exception($error);
	}

	/*
	*执行数据库查询
	*@param string $query 数据库查询sql字符串
	*@param mixed $handle 连接对象
	*#return resource
	**/ 

	public function query($query,$handle){
		if($resource=@sqlite_query($query,$handle)){
			return $resource;
		}
	}
}


class sqlFactory{
	public static function factoty($type){
		$classname = 'Db_Adapter_'.$type;
		return new $classname;
	}
}

// $db = sqlFactory::factoty('Mysql');
$db = sqlFactory::factoty('Sqlite');








 










