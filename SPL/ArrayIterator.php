<?php

$fruits = array(
	"apple" => "apple value",  // position = 0
	"orange" => "orange value", // position = 1
	"grape" => "grape value",
	"plum" => "plum value"
);

print_r($fruits);
echo "****** use fruits directly\n";

foreach ($fruits as $key => $value) {
	echo $key . ":" . $value. "\n";
}

// 使用ArrayIterator遍历数组
$obj = new ArrayObject($fruits);
$it = $obj->getIterator();

echo "***** use ArrayIterator in for\n";
foreach ($it as $key => $value) {
	echo $key . ":" . $value. "\n";	
}

echo "***** use ArrayIterator in while\n";
$it->rewind();
while ($it->valid()) {
    echo $it->key() . ":" . $it->current(). "\n";
    $it->next();
}

//跳过某些元素进行打印
echo "***** use seek in while\n";
$it->rewind();
if($it->valid()){
	$it->seek(2);
	while($it->valid()){
		echo $it->key() . ":" . $it->current(). "\n";
		$it->next();
	}
}

// 对key进行字典序排序
echo "***** use ksort\n";
$it->ksort();
foreach ($it as $key => $value) {
	echo $key . ":" . $value. "\n";
}

// 对值进行字典序排序
echo "***** use asort\n";
$it->asort();
foreach ($it as $key => $value) {
	echo $key . ":" . $value. "\n";
}

?>