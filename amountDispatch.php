<?php
 
function getChange($amount, $denominations) {

 	if( empty($amount) || !empty($amount % 100)) {
 		return "Invalid amount";
 	} 

 	if( empty($denominations) ) {
 		return "Unable to dispatch amount";
 	} 
 	
 	rsort($denominations);

 	$remainingAmount = 0;
 	foreach ($denominations as $value) {
 		$remains = floor( $amount / $value );
 		if($remains) {
 			$remainingAmount = $value * $remains;
 			$resArr[$value] = $remains;
 			$amount -= $remainingAmount;
 		}

 		if( empty( $amount ) ) {
 			return $resArr;
 		}
 	}

 	return "Unable to dispatch amount";
}
 
getChange(6700, [ 100, 500, 2000 ]); // 3*2000 + 1*500 + 2*100
getChange(125, [ 100, 500, 2000 ]); // Impossible
