<?php
session_start();
$username=$_POST['username'];
$password=md5($_POST['password']);
$verify=trim(strtolower($_POST['verify']));
$verifyCode=trim(strtolower($_SESSION['verifyCode']));
$act=$_GET['act'];
$link=mysql_connect('localhost','root','') or die('Connect Error');
mysqli_set_charset($link,'utf8');
mysqli_select_db($link, 'test1') or die('Database Open Error');
switch($act){
    case 'login':
    //校验用户填写的验证码是否正确
    if($verify!==$verifyCode){
        exit("<script>
            alert('验证码不正确');
            location.href='login.php';
            </script>")
        }
    $username=mysqli_escape_string($link,$username);
    $sql="SELECT * FROM user WHERE username='{$username}' AND password='{$password}'";
    $result=mysqli_query($link,$sql);
    if(mysqli_num_rows($result)==1){
        $_SESSION['username']=mysqli_fetch_assoc($result)['username'];
        $_SESSION['isLogin']=1;
        exit("<script>
            alert('登录成功');
            location.href='index.php';
            </script>")
    }else{
        exit("<script>
            alert('登录失败');
            location.href='login.php';
            </script>");
    }
    break;
    case 'logout':
    $_SESSION=[];

    //删除会话Cookie
    if(ini_get('session.use_cookies')){
        $params=session_get_cookie_params();
        setcookie(session_name(),'',time()-1,$params['path'],$params['domain'],$params['secure'],$params['httponly']);
    }

    session_destroy();
    header('location:login.php');
    break;
}