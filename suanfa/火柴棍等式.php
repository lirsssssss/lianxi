<?php
meiju(18);

function meiju($num){
	$sum = 0;
	for ($a=0; $a <= 1111; $a++) { 
		for ($b=0; $b <= 1111 ; $b++) { 
			$c = $a+$b;
			if (fun($a)+fun($b)+fun($c) == $num-4) {
				echo $a.'+'.$b.'='.$c.'<br>';
				$sum++;
			}
		}
	}
	echo $sum;
}

function fun($x){
	$num = 0;
	$f = [6,2,5,5,4,5,6,3,7,6];
	while (intval(floor($x/10)) != 0) {
		$num += $f[$x%10];
		$x = intval(floor($x/10));
	}

	$num += $f[$x];
	return $num;
}

