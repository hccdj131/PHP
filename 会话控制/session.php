<?php

//开启会话
session_start();
//设置数据
$_SESSION['username']='king';
$_SESSION['email']='muke@imooc.com';
$_SESSION['age']=23;

//将$_SESSION数据清空
$_SESSION=[];

//删除会话Cookie
if(ini_get('session.use_cookies')){
    $params=session_get_cookie_params();
    setcookie(session_name(),'',time()-1,$params['path'],$params['domain'],$params['secure'],$params['httponly']);
}

//销毁对话
session_destroy();
