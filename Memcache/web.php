<?php

$mc = new Memcache(); // 创建Memcache对象
$mc->connect('127.0.0.1',11211);

$uid = (int)$_GET['uid'];
$sql = "SELECT * FROM users WHERE uid = '$uid";
$key = md5($sql);

//数据库查询结果是否已经缓存到Memcached服务中
if(!($datas = $mc->get($key))){
    //在Memcached中未获取缓存数据，则使用数据库查询获取记录集
    $conn = mysql_connect('localhost', 'test', 'test');
    mysql_select_db('test');
    $result = mysql_query($sql);
    while($row = mysql_fetch_object($result)) {
        $datas[] = $row;
    }
    //将从数据库中获取的结果集数据保存到Memcached中，以供下次访问时使用
    $mc->add($key,$datas);
}
var_dump($datas);
?>