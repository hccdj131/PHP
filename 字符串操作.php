<?php
字符串需要写到定界符
定界符
单引号不解析变量  效率比较高
双引号解析变量
heredoc语法结构
nowdoc语法结构
转义符：当内容和定界符冲突的时候需要使用转义符

双引号解析所有的转义符
单引号只转义\\ \'两个转义符

echo 'King';


当PHP解析器遇到一个美元符号（$）时，它会和其它很多解析器一样，去组合尽量多的标识以形成一个合法的变量名。
可以用花括号来明确变量名的界线，将变量扩成一个整体来解析。

$username='king';
echo "我的名字为{$username}";
echo "我的名字为${username}";
// 花括号之间不要有空格

可以通过花括号对字符串中的指定字符做增删改查操作
字符串下标从0开始
可以使用[]实现相同的操作

$str='abcdef';
echo $str{0};
查
$char=$str{3};
改
$str{1}='m';
只能用一个字符修改一个字符

删m
$str='imooc';
$str{1}='';
用空字符串替代m

添加字符
$str='abc';
$str{2}='d';

随机取一个字符
$string='lsjdfojsdojfosdjfojofjjdfdsjofjsdojf';
echo $string{mt_rand(0,strlen($string)-1)};

通过heredoc语法结构来写,相当于双引号
$table=<<<EOF
<table border='1' width="80%">
	<tr>
		<td>编号</td>
		<td>用户名</td>
		<td>描述</td>
	</tr>
	<tr>
		<td>1</td>
		<td>king</td>
		<td>He said.....</td>
	</tr>
</table>

EOF;

echo $table;

通过heredoc语法结构来写,相当于单引号

settype($var,type)
gettype($var)
设置变量类型，永久转换
$var=12;
settype($var,'string');
var_dump($var);
