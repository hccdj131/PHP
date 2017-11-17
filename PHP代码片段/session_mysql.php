<?php
1.更改php.ini文件。  由于php默认保存session的方式是files所以我们要改变它。即：找到―session.save_handler = files‖将―files‖改为―User‖。  把session的模式改成用户自定义的。

2.建立数据库： 
CREATE TABLE `db_session` (    `sesskey` char(32) NOT NULL,    `expiry` int(11) unsigned NOT NULL,    `value` text NOT NULL,    PRIMARY KEY   (`sesskey`) 
) ENGINE=InnoDB DEFAULT CHARSET=latin1; 数据库表明：db_session 
列名：sesskey，expiry，value 其中：sesskey为主键。 Value里面存放着session里面的值。


	$gb_DBname="db_myBBS"; //数据库名称
	$gb_DBuser="root"; //数据库用户名称
	$gb_DBpass=''; //密码
	$gb_DBHOSTname="localhost" //主机名称或IP地址

	$SESS_DBH="";
	$SESS_LIFE=get_cfg_var("session.gc_maxlifetime"); //得到session的最大有效期

	function sess_open($save_path, $session_name){
		global $gb_DBHOSTname, $gb_DBuser, $gb_DBpass, $SESS_DBH;
		if(!$SESS_DBH=mysql_pconnect($gb_DBHOSTname, $gb_DBuser, $gb_DBpass)){
			echo '<li>MySql Error:".mysql_error()."</li>';
			die();
		}
		if(!mysql_select_db($gb_DBname,$SESS_DBH)){
			echo '<li>MySql Error:".mysql_error()."</li>';
			die();
		}
		return true;
	}

	function sess_close(){
		return true;
	}

	function sess_read($key){
		global $SESS_DBH, $SESS_LIFE;
		$query = "select value from db_session where sesskey = '$key' and expiry >".time();
		$qid = mysql_query($query, $SESS_DBH);
		if(list($value)=mysql_fetch_row($qid)){
			return $value;
		}
		return false;
	}

	function sess_write($key,$val){
		global $SESS_DBH, $SESS_LIFE;
		$expiry = time() + $SESS_LIFE;
		$value = $val;
		$query = "insert into db_session values('$key', $expiry, '$value')";
		$qid = mysql_query($query, $SESS_DBH);
		if(!$qid){
			$query = "update db_session set expiry = $expiry, value='$value' where sesskey = '$key' and expiry >".time();
			$qid = mysql_query($query, $SESS_DBH);
		}
		return $qid;
	}

	function sess_destroy($key){
		global $SESS_DBH;
		$query = "delete from db_session where sesskey = '$key'";
		$qid = mysql_query($query, $SESS_DBH);
		return $qid;
	}

	function sess_gc($maxlifetime){
		global $SESS_DBH;
		$query = "delete from db_session where expire <".time();
		$qid = mysql_query($query,$SESS_DBH);
		return mysql_affected_rows($SESS_DBH);
	}

	session_module_name();
	session_set_save_handler("sess_open", "sess_close", "sess_read", "sess_write", "sess_destroy", "sess_gc");


	测试文件

include 'session_mysql.php';

session_start();
$_SESSION['abc']="A:I will be back!";
$_SESSION['meto']="B: Me too";
$_SESSION['name']="louis";
echo "<a href=\"get_session_test.php\">click me</a>";


get_session_test.php
include ("session_mysql.php");
session_start();
echo $_SESSION['abc'];
echo "<br>";
echo $_SESSION['meto'];
echo"<br>";
echo $_SESSION['name'];
$_SESSION['wq']="12e";
echo "<br><a href=\"get_session_test2.php\">click again</a>";

get_session_test2.php
include ("session_mysql.php");
session_start();
echo $_SESSION['abc'];
echo "<br>";
echo $_SESSION['meto'];
echo"<br>";
echo $_SESSION['name'];
$_SESSION['wq']="12e";
echo "<br><a href=\"get_session_test2.php\">click again</a>";
// session_destroy(); 
