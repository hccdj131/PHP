<?php
/**
 * author: NickBai
 * createTime: 2016/12/17 0017 下午 3:00
 */

$socket_client = stream_socket_client('tcp://127.0.0.1:2000', $errno, $errstr, 30);
fwrite($socket_client, "hello world");
sleep(1);
$return = fread($socket_client, 1024);
echo "come from server : " . $return . PHP_EOL;
sleep(2);

fwrite($socket_client, "send again!");
$return = fread($socket_client, 1024);
echo "come from server : " . $return . PHP_EOL;

