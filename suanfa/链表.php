<?php
error_reporting(E_ALL ^ E_NOTICE);
function lianbiao($arr,$num){
	$n = count($arr);
	$len = $n;
unset($arr[0]);
	//初始化数组
	for ($i=1; $i <=$n ; $i++) { 
		if ($i != $n) {
			$right[$i] = $i+1;
		}else{
			$right[$i] = 0;
		}
	}

	//直接在数组data的末尾增加一个数
	$len++;
	$arr[$len] = $num;

	//从链表的头开始遍历
	$t = 1;
	while ($t != 0) {
		//如果当前节点下一个节点的值大于待插入数,将数插入到中间
		if ($arr[$right[$t]] > $arr[$len]) {
			//新插入的数的下一个节点标号等于当前节点的下一个节点编号
			$right[$len] = $right[$t];
			//当前节点的下一个节点编号就是新插入数的编号
			$right[$t] = $len;
			//插入完成跳出循环
			break;
		}
		$t = $right[$t];
	}
	//输出链表中所有的数
	$t = 1;
	var_dump($right);//当前序列数组arr位置
	echo '<br>';
	var_dump($arr);//具体数字位置
	echo '<br>';
	while ($t != 0) {
		echo $arr[$t].' ';
		$t = $right[$t];
	}

}


lianbiao(array(0,2,3,5,8,9,10,18,26,32),6);





































