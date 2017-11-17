<?php
try{
	$dsn = "mysql:dbname=classphp; host=127.0.0.1";
	$name = 'root';
	$pwd = "";
	$pdo = new PDO($dsn, $name, $pwd);
	$pdo -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	// echo $pdo -> getAttribute(PDO::ATTR_ERRMODE);
	$username = "user1";
	$pwd = md5(123456);
	$email = 'user@admin.com';
	$sql = "INSERT INTO user(username, pwd, email) VALUE('{$username}', '{$pwd}', {$email}')";
	$affected = $pdo -> exec($sql);
	var_dump($affected);
	// $pdo -> query()
}catch(PDOException $e){
	echo $e -> getMessage();
}