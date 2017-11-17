<?php

// 连接数据库并返回数据库连接句柄

$pdo = new PDO('mysql:host=localhost;dbname=restful', 'root', 'root');
return