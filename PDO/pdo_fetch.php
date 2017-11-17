<?php
header('content-type:text/html;charset=utf-8');
try{
    $pdo=new PDO('mysql:host=localhost;dbname=imooc','root','');
    $sql='select * from user';
    $stmt=$pdo->prepare($sql);
    $res=$stmt->execute();
    if($res){
        while($row=$stmt->fetch()){
            print_r($row);
            echo '<hr/>';
        }
    }

}catch(PDOException $e){
    echo $e->getMessage();
}

