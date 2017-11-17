<?php

require_once('./db.php');

$connnect = Db::getInstance()->connect();
$sql = "select*from news where `category_id` = 1 and `status` = 1 order by id desc limit 5";
$result = mysql_query($sql, $connect);
$news = array();
while($row = mysql_fetch_array($result)) {
	$news[] = $row;
}