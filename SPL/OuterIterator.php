<?php

$array = ['Value1','Value2','Value3','Value4'];
$outerObj = new OuterImpl(new ArrayIterator($array));

foreach ($outerObj as $key => $value) {
	echo '++'.$key." - ".$value."\n";
}

class OuterImpl extends IteratorIterator
{
   
    public function current()
    {
        return "Pre_".parent::current()."_tail";
    }
    public function key()
    {
    	return "Pre_".parent::key();
    }
}