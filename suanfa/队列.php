<?php
error_reporting(E_ALL ^ E_NOTICE);
//队列
function lists($arr){
	//初始化
	$head = 1;
	$tail = 10;//队列中已经有9个元素了,tail指向队尾的后一个位置

	while ($head < $tail) {//当队列不为空的时候执行循环
		//输出队列首位并将队列首位出队
		echo $arr[$head];
		$head ++;
		//先将新队首的数添加到队尾
		$arr[$tail] = $arr[$head];
		$head ++;
		//再将队列首位出队
		$tail ++;	
	}


}

lists(array(0,6,3,1,7,5,8,9,2,4));