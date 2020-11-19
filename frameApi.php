<?php
/**
* 



*/ 
class Index
{
	public $post = 'post';

	function __construct($param)
	{
		if (!empty($param)) {
			$this->post = $param;
		}
		
	}

	public function index()
	{
		echo  json_encode(['token'=>md5($this->post)]);

	}
}

$param = $_GET['r'];

$obj = new Index($_POST);

echo $obj->$param();

