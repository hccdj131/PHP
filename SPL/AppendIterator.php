<?php

$array_a = new ArrayIterator(array('a','b','c'));
$array_b = new ArrayIterator(array('d','e','f'));
$it = new AppendIterator();

// 通过append方法把迭代器对象添加到AppendIterator对象中
$it->append($array_a);
$it->append($array_b);

foreach ($it as $key => $value) {
	echo $value."\n";
}

?>