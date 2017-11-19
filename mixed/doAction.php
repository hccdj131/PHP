<?php
header('content-type:text/html;charset=utf-8');
// 接收数据
$username=$_POST['username'];
$password=$_POST['password'];
$password1=$_POST['password1'];
$email=$_POST['email'];
$fav=$_POST['fav'];
$verify=trim(strtolower($_POST['verify']));
$verify1=trim(strtolower($_POST['verify1']));
$redirectUrl='<a href="reg.php">重新注册</a>';

// 检测用户名的合法性
// 检测用户名首字母是否为字母
$char=$username{0};
检测第一个字符是否是字母
$ascii=ord($char); //得到指定字符的ASCII
// 检测ASCII是否在65~90(A~Z)或者97~122(a~z)
if(!(($ascii>=65&&ascii<=90||(ascii>=97&&$ascii<=122))){
	exit('用户名首字母不是以字母开始<br/>'.$redirectUrl);
})
检测用户名长度是否符合要求 6~10
$userLen=strlen($username);
if($userLen<6 || $userLen>10){
	exit('用户名长度不符合规范<br/>'.$redirectUrl);
}

// 检测密码不能为空
$pwdLen=strlen($password);
if($pwdLen==0){
	exit('密码不能为空<br/>'.$redirectUrl);
}
// 检测密码长度是否符合规范
if($pwdLen<6||$pwdLen>10){
	die('密码长度不符合规范<br/>'.$redirectUrl);
}

// 检测两次密码是否一致
if(strcmp($password,$password1)!==0){
	exit('两次密码不一致<br/>'.$redirectUrl);
}
检测验证码是否符合规范
if($verify!==$verify1){
	exit('验证码错误<br/>'.$redirectUrl);
}

echo '注册成功，信息如下:<br/>';

$userInfo=<<<EOF
<table>
	<tr>
		<td>用户名</td>
		<td>密码</td>
		<td>邮箱</td>
		<td>兴趣爱好</td>
	</tr>
	<tr>
		<td>{$username}</td>
		<td>{$password}</td>
		<td>{$email}</td>
		<td>{$fav}</td>
	</tr>
</table>
EOF;

echo $userInfo;
