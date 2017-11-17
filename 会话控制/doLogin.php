<?php

$username=$_POST['username'];
$password=md5($_POST['password']);
$autoLogin=$_POST['autoLogin'];

//连接
$link=mysqli_connect('localhost','root','') or die('Connect Error');
mysqli_set_charset($link, 'utf8');
mysqli_select_db($link, 'test1') or die('Database Open Error');

$sql="SELECT id,username,password FROM user WHERE username='{$username}' && password='{$password}'";
$sql=mysqli_escape_string($link, $sql);

if(mysqli_num_rows($result)==1){
    if($autoLogin==1){
        $row=mysqli_fetch_assoc($result);
        setcookie('username',$username,strtotime('+7 days'));
        $salt='king';
        $auth=md5($username.$password.$salt).":".$row['id'];
        setcookie('auth',$auth,strtotime('+7 days'));
    }else{
        setcookie('username',$username);
    }
    exit("<script>
        alert('登录成功')；
        location.href='index.php';
        </script>");
}else{
    exit("<script>
        alert('登录失败');
        location.href='login.php';
        </script>");
}