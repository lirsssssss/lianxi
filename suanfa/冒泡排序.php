<?php
function maopao($num){
	$n = count($num);
	for ($i=1; $i < $n-1; $i++) { 
		for ($j=0; $j < $n-$i; $j++) { 
			if ($num[$j]<$num[$j+1]) {
				$t = $num[$j];
				$num[$j] = $num[$j+1];
				$num[$j+1]= $t;
			}
		}
	}
	echo '<pre>';
	var_dump($num);
}

// maopao(array(23,54,22,18,32,44));

function student($num){
	$n = count($num);
	for ($i=1; $i < $n; $i++) { 
		for ($j=0; $j < $n-$i; $j++) { 
			if ($num[$j][1]<$num[$j+1][1]) {
				$t = $num[$j];
				$num[$j] = $num[$j+1];
				$num[$j+1]= $t;
			}
		}
	}
	echo '<pre>';
	var_dump($num);

}

student([['huhu',5],['haha',3],['xixi',5],['hengheng',2],['gaoshu',8]]);

