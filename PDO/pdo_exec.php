<?php
try{
    $pdo=new PDO('mysql:host=localhost;dbname=imooc','root','');

    $sql=<<<EOF
        CREATE TABLE IF NOT EXISTS user(
        id INT UNSIGNED AUTO_INCREMENT KEY,
        username VARCHAR(20) NOT NULL UNIQUE,
        password CHAR(32) NOT NULL,
        email VARCHAR(30) NOT NULL
    );        
EOF;
    $res=$pdo->exec($sql);

}catch(PDOException $e){
    echo $e->getMessage();
}