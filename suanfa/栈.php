<?php
function zhan($str){
	//求字符串长度
	$len = strlen($str);
	//求字符串中点
	$mid = intval(floor($len/2-1));
	//初始化栈
	$top = 0;
	//将mid钱的字符依次入栈
	for ($i=0; $i <= $mid; $i++) 
	{ 
		$st[++$top] = $str[$i];
	}
	//判断字符串的长度是奇数还是偶数,并找出需要进行字符匹配的起始下标
	if($len%2 == 0)
		$next = $mid+1;
	else
		$next = $mid+2;
	//开始匹配
	for ($i=$next; $i <= $len-1; $i++)
	{ 
		if ($str[$i] != $st[$top]) {
			break;
		}
		$top --;
	}
	//如果top的值为0 则说明栈内所有的字符都被匹配了
	if ($top == 0) {
		echo 'Y';
	}else{
		echo 'N';
	}

}


zhan('([{}()])');