<?php

//设置autoload寻找php定义的类文件的扩展名，多个扩展名用逗号分隔，前面的扩展名优先被匹配
spl_autoload_extensions('.class.php');

//设置autoload寻找php定义的类文件的目录，多个目录用PATH_SEPARATOR进行分隔
set_include_path(get_include_path().PATH_SEPARATOR."libs/");

//提示PHP使用Autoload机制查找类定义
spl_autoload_register();

new Test();

// 第二种方法
// 定义__autoload函数，可以在不调用spl_autoload_register函数的情况下完成类的装载
function __autoload($class_name){
	echo '__autoload class:'.$class_name."\n";
	//装载类
	require_once("libs/".$class_name.'.php');
}


//定义一个替换__autoload函数的类文件装载函数
function classLoader($class_name){
	echo 'classLoader() load class:'.$class_name."\n";
	//装载类
	require_once("libs/".$class_name.'.php');
}
//传入定义好的装载类的函数的名称替换__autoload函数
spl_autoload_register('classLoader');

new Test();

// 定义一个替换__autoload函数的类文件装载函数
function classLoader($class_name){
	echo "classLoader() load class: ".$class_name."\n";
	set_include_path("libs/");
	// 当我们不用require或者require_once载入类文件的时候，而想通过系统查找include_path来装载类时，必须显式调用spl_autoload函数，参数是类的名称来重启类文件的自动查找（装载）
	spl_autoload($class_name);
}

?>