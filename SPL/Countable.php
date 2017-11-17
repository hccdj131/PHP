<?php

$array = array(
	array('name'=>'Jonathan','id'=>'5'),
	array('name'=>'Peter','id'=>'6'),
	array('name'=>'Lisa','id'=>'7')
);

echo count($array) . "\n";
echo count($array[1]) . "\n";

/**
 * summary
 */
class CountMe implements Countable
{
    /**
     * summary
     */
    protected $_myCount = 3;
    public function count()
    {
    	return $this->_myCount;
    }
}
$obj = new CountMe();
echo count($obj);

