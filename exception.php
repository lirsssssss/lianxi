<?php
header('Content-type:text/html; charset=utf-8');
$a = null;
try{
	$a = 5/1;
	echo $a,PHP_EOL;
}catch(exception $e){
	$e->getMessage();
	$a = -1;
}
echo $a;

class emailException extends exception{

}

class pwdException extends exception{
	function __toString(){
		return "<div class=\"error\"> exception {$this->getCode()}:
		{$this->getMessage()}
		in File:{$this->getFile()} on line:{$this->getLine()}<div>";
		//改写抛出异常
	}
}


function reg($reginfo = null){
	if(empty($reginfo) || !isset($reginfo)){
		throw new Exception("Error 参数非法");
		
	}
	if(empty($reginfo['email'])){
		throw new emailException("Error 邮件为空");
		
	}

	if($reginfo['pwd'] != $reginfo['repwd']){
		throw new pwdException("Error 两次密码不一致");
	}
	echo '注册成功';
}

//补货所抛出的各种异常 进行分类处理
try{
	reg(array('email'=>'123@!23','pwd'=>123456,'repwd'=>12345678));
}catch(emailException $ee){
	echo $ee->getMessage();
}catch(pwdException $ep){
	echo $ep;
	echo PHP_EOL,'特殊处理';
}catch(Exception $e){
	echo $e->getTraceAsString();
	echo PHP_EOL,'其他情况,统一处理';
}

// echo reg(array('email'=>'waitfox@qq.com','pwd'=>'1234','repwd'=>'1234'));