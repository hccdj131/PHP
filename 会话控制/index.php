<?php
    if(!isset($_COOKIE['username'])) { 
        exit("<script>
            alert('请您先登录之后访问');
            location.href='login.php';
            </script>");
    }
    if(isset($_COOKIE['auth'])){

    // 校验用户登录凭证
    $auth=$_COOKIE['auth'];
    $resArr=explode(':',$auth);
    $userID=end($resArr);
    $link=mysqli_connect('localhost','root','') or die ('Connect Error');
    mysqli_set_charset($link, 'utf8');
    mysqli_select_db($link, 'test1') or die('Database Open Error');
    $sql="SELECT id,username,password FROM user WHERE id=$userId";
    $result=mysqli_query($link,$sql);

    if(mysqli_num_rows($result)==1){
        $row=mysqli_fetch_assoc($result);
        $username=$row['username'];
        $password=$row['password'];
        $salt='king';
        $authStr=md5($username.$password.$salt);
        if($authStr!=$resArr[0]){
            exit("<script>
            alert('请您先登录之后访问');
            location.href='login.php';
            </script>");
        }
    }else{
        exit("<script>
            alert('请您先登录之后访问');
            location.href='login.php';
            </script>");

    }
}