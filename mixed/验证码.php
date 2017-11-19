<?php
$string='qwerososldmcsowerljadfsdfLJLDJFJSDIFJIEJERWEROUOCVNMNMN1234567890';

$code='';
for($i=1;$i<=4;$i++){
	$code.='<span style="color:rgb('.mt_rand(0,255).','.mt_rand(0,255).','.mt_rand(0,255).')">'.$string{mt_rand(0,strlen($string)-1)}.'</span>';
}

echo $code;