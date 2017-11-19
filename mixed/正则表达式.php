<?php

常用的正则表达式函数

preg_match($pattern, $subject)
preg_match_all($pattern, $subject, array&$matches)
preg_replace($patter, $replacement, $subject)
preg_filter($pattern, $replacement, $subject)
preg_grep($pattern, array $input)
preg_split($pattern, $subject)
preg_quote($str)

$pattern = 正则表达式
$subject = 匹配的目标数据


preg_match($pattern, $subject)
preg_match_all($pattern, $subject, array&$matches)

$pattern = '/[0-9]/';
$subject = 'weuyr3ui76as83s0ck9';

$m1 = $m2 = array();

$t1 = preg_match($pattern, $subject, $m1);
$t2 = preg_match_all($pattern, $subject, $m2);

show($m1);
echo '<hr />';
show($m2);
echo '<hr />';
show($t1.'||'.$t2);


// preg_replace($patter, $replacement, $subject)
// preg_filter($pattern, $replacement, $subject)

$pattern = '/[0-9]/';
$pattern = array('/[0123]/', '/[456]/','/[789]/');
$subject = 'weuyr3ui76as83s0ck9';
$replacement = '慕女神';
$replacement = array('慕', '女'，'神');

$str1 = preg_replace($pattern, $replacement, $subject);
$str2 = preg_filter($pattern, $replacement, $subject);

show($str1);
show($str2);

filter不会保留数字

// preg_grep($pattern, array $input) 
// 阉割版的preg_filter
// 只匹配，不替换

$pattern = '/[0-9]/';
$subject = array('weuy','r3ui', '76as83', 's', '0ck9');

$arr = preg_grep($pattern, $subject);

// preg_split($pattern, $subject)

$pattern = '/[0-9]/';
$subject = '慕3女2神，5约吗？';

$arr = preg_split($pattern, $subject);

show($arr);

// preg_quote($str)
正则运算符转义

$str = 'qwer{asdf}[1234]';

$str = preg_quote($str);


// show函数
function show($var = null) {
	if(empty($var)) {
		echo 'null';
	} elseif(is_array($var) || is_object($var)) {
		// array,object
		echo '<pre>';
		print_r($var);
		echo '</pre>';
	} else {
		// string, int, float...
		echo $var;
	}
}


正则表达式语法

界定符
原子
量词
边界控制
模式单元


界定符
表示一个正则表达式的开始和结束

两个斜杠
/[0-9]/
两个井号
#[0-9]#
两个大括号,一般不使用
{[0-9]}

$pattern = '/[0-9]/';

regexpal


原子概念
可见原子-Unicode编码表中用键盘输出后肉眼可见的字符

不可见原子-Unicode编码表中用键盘输出后肉眼不可见的字符

将文字转换成unicode再匹配

tab字表符
\t

回车，换行符
\n


元字符
原子的筛选方式
	-  | 匹配两个或者多个分支选择
	-  [] 匹配方括号中的任意一个原子
	-  [^] 匹配除方括号中的原子之外的任意字符  [^789]

	[a-z]匹配a-z所有字母
	[0-9]
	[A-Za-z0-9]

原子的集合
- . 匹配除换行符之外的任意字符
- \d 匹配任意一个十进制数字，即[0-9]
- \D 匹配任意一个非十进制数字，即[^0-9]
- \s 匹配一个不可见原子，即[\f\n\r\t\v]
- \S 匹配一个可见原子，即[^\f\n\r\t\v]
- \w 匹配任意一个数字、字母或下划线，即[0-9a-zA-Z_]
- \W 匹配任意一个非数字、字母或下划线，即[^0-9a-zA-Z_]


量词
{n}  表示其前面的原子恰好出现n次
5{3}  连续出现3个5,

{n,}  表示其前面的原子最少出现n次
{n,m}  表示其前面的原子最少出现n次，最多出现m次
*    匹配0次、1次或者多次其之前的原子，即{0,}
+    匹配1次或者多次其之前的原子，即{1,}
?    匹配0次或者1次其之前的原子，即{0,1}


边界控制与模式单元
^ 匹配字符串开始的位置
$ 匹配字符串结尾的位置

() 匹配其中的整体为一个原子


修正模式
贪婪匹配-匹配结果存在歧义时取其长

懒惰匹配-匹配结果存在歧义的取其短

默认是贪婪模式

/0-9/U 懒惰模式

U - 懒惰匹配
u - 贪婪屁屁额 
i - 忽略英文字母大小写
x - 忽略空白
s - 让元字符'.' 匹配包括换行符在内所有字符


.+            非空，必填项    
\d+\.\d{2}$     货币、匹配保留两位数字的浮点数
1[34578]\d{9}   手机号
^\w+(\.\w+) *@\w+(\.\w+)+$     email地址
^(https?://)?(\w+\.)+[a-zA-Z]+$   URL地址
