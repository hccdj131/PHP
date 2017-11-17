<?php
// 设置cookie的过期时间
setcookie('a', 'aaa', time()+10);
setcookie('a', 'aaa', time()+20);
// 一周内登录
setcookie('auth',true,time()+7*24*60*60);
setcookie('autoLogin', true, strtotime('+7 days'));

setcookie('testPath1', 'test1', time()+3600); //默认当前路径下/test
setcookie('testPath2', 'test2', time()+3600, '/'); //根路径

// 删除cookie
setcookie('username', '', time()-1);

//通过header形式设置cookie
header('Set-Cookie: a=1');
header('Set-Cookie: b=2;expires='.gmdate('D, d M Y H:i:s \G\M\T',time()+3600));