<?php

$idIter = new ArrayIterator(array('01','02','03'));
$nameIter = new ArrayIterator(array('张三','李四','王五'));
$ageIter = new ArrayIterator(array('22','23','25'));

$mit = new MultipleIterator(MultipleIterator::MIT_KEYS_ASSOC);
$mit->attachIterator($idIter,"ID");
$mit->attachIterator($nameIter,"NAME");
$mit->attachIterator($ageIter,"AGE");

foreach ($mit as $value) {
	print_r($value);
}

?>
