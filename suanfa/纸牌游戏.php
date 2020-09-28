<?php
function playing($q1,$q2){
	//初始化队列 初始化栈
	$s = array('data'=>array(),'top'=>0);
	for ($i=0; $i < count($s['data']); $i++) { 
		$s['data'][$i] = 0;
	}
	//p1
	$p1 = array('data'=>$q1,'head'=>0,'tail'=>count($q1));	
	//p2
	$p2 = array('data'=>$q2,'head'=>0,'tail'=>count($q2));

	//初始化用来标记的数组,用来标记哪些牌已经在桌子上了
	for ($i=1; $i <= 9; $i++) { 
		$book[$i] = 0;
	}	
	//当队列不为空的时候执行循环
	while ($p1['head']<$p1['tail'] && $p2['head'] < $p2['tail']) {
		//p1出一张牌
		$t = $p1['data'][$p1['head']];
		//判断p1当前打出的牌是否能赢牌
		if ($book[$t] == 0) { //表明桌上没有牌面为t的牌
			$p1['head']++;//p1已经打出一张牌,所以要把打出的牌出队
			$s['top']++; 
			$s['data'][$s['top']] = $t;//再把打出的牌放在桌上,既入栈

			$book[$t] = 1;//标记桌上现在已经有牌面为t的牌
		}else{
			//p1一轮可以赢牌
			$p1['head']++;//p1已经打出一张牌，所以要把打出的牌出队
			$p1['data'][$p1['tail']] = $t;//紧接着把打出的牌放到手中牌的末尾
			$p1['tail']++;
			//把桌上可以赢得的牌依次放到手中牌的末尾
			while ($s['data'][$s['top']] != $t) {
				$book[$s['data'][$s['top']]] = 0;//取消标记
				//依次放入队尾
				$p1['data'][$p1['tail']] = $s['data'][$s['top']];
				$p1['tail']++;
				//栈中少了一张牌，所以栈顶要减1
				$s['top']--;
			}
		}

		//p2出一张牌
		$t = $p2['data'][$p2['head']];

		//判断p2当前打出的牌是否能赢牌
		if ($book[$t] == 0) { //表明桌上没有牌面为t的牌
			$p2['head']++;//p2已经打出一张牌,所以要把打出的牌出队
			$s['top']++;
			$s['data'][$s['top']] = $t;//再把打出的牌放在桌上,既入栈
			$book[$t] = 1;//标记桌上现在已经有牌面为t的牌
		}else{
			//p1一轮可以赢牌
			$p2['head']++;//p2已经打出一张牌，所以要把打出的牌出队
			$p2['data'][$p2['tail']] = $t;//紧接着把打出的牌放到手中牌的末尾
			$p2['tail']++;
			//把桌上可以赢得的牌依次放到手中牌的末尾
			while ($s['data'][$s['top']] != $t) {
				$book[$s['data'][$s['top']]] = 0;//取消标记
				//依次放入队尾
				$p2['data'][$p2['tail']] = $s['data'][$s['top']];
				$p2['tail']++;
				//栈中少了一张牌，所以栈顶要减1
				$s['top']--;
			}
		}
	}

	if ($p2['head'] == $p2['tail']) {
		echo 'p1Win<br>';
		echo 'p1当前的手牌是: ';
		var_dump($s['data']);die();
		for ($i=$p1['head']; $i <= $p1['tail']-1; $i++) { 
			echo ' '.$p1['data'][$i];
		}
		if ($s['top'] > 0) {//如果桌上有牌则依次输出桌上的牌
			echo '<br> 桌上的牌为: ';
			for ($i=1; $i <= $s['top']; $i++) { 
				echo ' '.$s['data'][$i];
			}
		}else{
			echo '<br> 桌面上已经没有牌了';
		}

	}else{
		echo 'p2Win<br>';
		echo 'p2当前的手牌是: ';
		for ($i=$p2['head']; $i <= $p2['tail']-1; $i++) { 
			echo ' '.$p2['data'][$i];
		}
		if ($s['top'] > 0) {//如果桌上有牌则依次输出桌上的牌
			echo '<br> 桌上的牌为: ';
			for ($i=1; $i <= $s['top']; $i++) { 
				echo ' '.$s['data'][$i];
			}
		}else{
			echo '<br> 桌面上已经没有牌了';
		}
	}


}

$q1 = array(2,4,1,2,5,6); 
$q2 = array(3,1,3,5,6,4);
playing($q1,$q2);





















