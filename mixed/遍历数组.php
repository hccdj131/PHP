<?php

$arr = ['name'=>'ck', 'age'=>27, 'sex'=>'male'];
for ($i=0; $i<count($arr); $i++){
	echo key($arr), '=>', current($arr), "\n";
	next($arr);
}


// foreach 索引数组
$arr = [0=>1, 1=>3, 2=>5, 3=>7, 4=>9];

foreach ($arr as $key=>$value) {
	echo 'the'.$key.'key value is'.$value, "\n";
}

$arr = ['name'=>'peter','age'=>28, 'isMarried'=>true];

foreach ($arr as $key=>$value) {
	echo 'the'.$key.'key value is'.$value, "\n";
}