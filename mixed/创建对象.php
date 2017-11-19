<?php

class Demo1
{
	public $name='PHP';

	public function getName()
	{
		return $this->name;
	}
	public function getObj()
	{
		return new self();
	}
	public function getStatic()
	{
		return new static();  // new static 创建的对象，直接与调用者绑定，静态延迟绑定
	}
}

class Demo2 extends Demo1
{
	public function getNewObj ()
	{
		return new parent();
	}
}

// 1.用new 类名()
$obj = new Demo1();
echo $obj->name;
echo '<hr>';

// 2.将类名，以字符串的方式放在一个变量中
$className = 'Demo1';
$obj1 = new $className();
echo $obj1 -> name;
echo '<hr>';
// 3
$obj2 = new $obj();// $obj2 = $obj是不同的
// 4