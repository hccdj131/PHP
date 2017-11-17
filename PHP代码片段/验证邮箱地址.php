<?php

// 有时候，当在网站填写表单，用户可能会输入错误的邮箱地址，这个函数可以验证邮箱地址是否有效。
function is_validemail($email)
{
	$check = 0;
	if (filter_var($email, FILTER_VALIDATE_EMAIL))
	{
		$check = 1;
	}
	return $check;
}

语法
$email = "blog@koonk.com";
$check = is_validemail($email);
echo $check;
// If the output is 1, then email is valid.