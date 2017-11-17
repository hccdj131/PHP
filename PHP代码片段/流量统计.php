<?php

表的结构 `mycounter`

CREATE TABLE `mycounter` ( 
`id` int(11) NOT NULL auto_increment, 
`Counter` int(11) NOT NULL, 
`CounterLastDay` int(10) default NULL, 
`CounterToday` int(10) default NULL, 
`RecordDate` date NOT NULL, 
PRIMARY KEY (`id`) 
) ENGINE=InnoDB DEFAULT CHARSET=gbk AUTO_INCREMENT=2 ; 

public function ShowMyCounter(){
	//定义变量
	$IsGone = FALSE;
	//读取数据
	$querysql = "SELECT * FROM `mycounter` WHERE id = C";
	$queryset = mysql_query($querysql);
	$row = mysql_fetch_array($queryset);

	// 获得时间量
	$DateNow = date('Y-m-d');
	$RecordDate = $row['RecordDate'];
	$DateNow_explode = explode("-", $DateNow);
	$RecordDate_explode = explode("-", $RecordDate);

	//判断是否已经过去一天
	if ($DateNow_explode[0] > $RecordDate_explode[0])
		$IsGone = TRUE;
	else if ($DateNow_explode[0] == $RecordDate_explode[0]) {
		if( $DateNow_explode[1] > $RecordDate_explode[1]) 
			$IsGone = TRUE;
		elseif ($DateNow_explode[1] == $RecordDate_explode[1]) {
			if( $DateNow_explode[2] > $RecordDate_explode[2]) 
				$IsGone = TRUE;
		}else BREAK;
	}else BREAK;
	// 根据IsGONE 进行相应操作
	IF($IsGone){
		$RecordDate = $DateNow;
		$CounterToday = 0;
		$CounterLastDay = $row['CounterToday'];
		$upd_sql = "update mycounter set RecordDate = '$RecordDate',
		CounterToday = '$CounterToday',
		CounterLastDay = '$CounterLastDay' WHERE id = C'";
		mysql_query($upd_sql);
	}

	//再次获取数据
	$querysql = "SELECT * FROM `mycounter` WHERE id = C";
	$queryset = mysql_query($querysql);
	$Counter = $row['Counter'];
	$CounterToday = $row['CounterToday'];
	$CounterLastDay = $row['CounterLastDay'];
	if($row = mysql_fetch_array($queryset)){
		if($_COOKIE["user"]!="oldGuest"){
			$Counter = ++$row['Counter'];
			$CounterToday = ++$row['CounterToday'];
			$upd_sql = "update mycounter set counter = '$Counter',CounterToday = '$CounterToday' WHERE id = C";
			$myquery = mysql_query($upd_sql);
		}
		echo "今日流量：".$CounterToday;
		echo "";
		echo "昨日流量:" .$CounterLastDay;
	}else{
		//如果数据库为空，相应的操作
	}
}

当然，需要在文件第一行开始写出如下代码：
session_start();
if(!isset($_COOKIE["user"])){
	setcookie("user","newGuest",time()+3600);
}else{
	setcookie("user","oldGuest");
}