<?php
class Demo
{
	const siteName = "PHP zhongwenwang";
	const domain = <<< 'EOT'
<a href="">www.php.cn</a>
EOT;
	
	public function getSiteName ()
	{
		return self::siteName;
	}
}

//方法1：类名：：类常量名
echo '1.类名::常量名:'.Demo::siteName.Demo::domain.'<hr>';
//方法2，类变量
$className = 'Demo';
echo '2.类变量::类常量名:'.$className::siteName;
//方法3.用当前类的对象来访问
echo '3.对象::类常量名:'.(new Demo)::siteName;
//方法4：用类中的方法来间接访问类常量
echo '4.对象->方法():'.(new Demo)->getSiteName();

