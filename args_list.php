<?php
function get_sum2(...$nums){
	$sum = 0;
	if(!$nums){
		return $sum;
	}else{
		foreach ($nums as $num) {
			$sum += $num;
		}
		return $sum;
	}
}