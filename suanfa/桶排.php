<?php
//桶排
function scanf($number){
	$a = range(0,10);
	// $b = range(0,10);
	for ($i=0; $i <=10 ; $i++) { 
		$a[$i] = 0;
		// $b[$i] = $i;
	}

	for ($i=0; $i < count($number) ; $i++) { 
		$a[$number[$i]] ++;
	}

	foreach ($a as $key => $value) {
		for ($i=1; $i <= $value; $i++) { 
			echo $key;
			echo '<br>';
		}
	}

	// for ($i=10; $i >= 0; $i--) { 
	// 	for ($j=1; $j <= $a[$i]; $j++) { 
	// 		echo $b[$i];
	// 		echo '<br>';
	// 	}
	// }
}

scanf(array(9,2,3,5,7,1,5));
