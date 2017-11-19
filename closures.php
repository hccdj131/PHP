<?php
//匿名函数：没有名称或者名称可以动态设置的函数
//创建一个匿名函数
$showMess = function ($study){
  return '我在'.$study.'学习~~';
}; //这是一个语句，结束必须加分号
//函数表达式：javascript中
//调用匿名函数
echo $showMess('php中文网');
echo '<hr>';
//闭包：就是在一个函数内，引入了一个匿名函数，就构成一个闭包
function display($domain){
  $site = function ($name) {
    return 'php中文网的域名是：'.$name;
  };
return $site($domain);
}
//调用一下这个闭包函数
echo display('www.php.cn');


 ?>
