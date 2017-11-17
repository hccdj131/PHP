<?php

常用字符串函数分类


字符串长度、查找、大小写转换、截取、ASCII、加密、比较、拆分、合并、格式化字符串、其它

$str='hello king';
// 检测变量是否是字符串
var_dump(is_string($str));

// 得到字符串的长度
echo .strlen($str);

$username="KiNg";
strtolower($username);

strtoupper($username);

//首字母
ucfirst($username);