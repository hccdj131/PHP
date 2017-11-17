<?php
    try{
        $pdo = new PDO("mysql:host=localhost;dbname=imooc","root","root123",array(PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION));
        $pdo->query("set names utf8");
        $sql = "select p.id, p.cover, p.title, p.price, p.originalprice, c.num from shop_product p right join shop_cart c on p.id=c.productid where c.userid=?";
        $stmt = $pdo->prepare($sql);
        session_start();
        $userid = $_SESSION['memberid'];
        $stmt->execute(array($userid));
        $data = $stmt->fetchAll(PDO::FETCH_ASSOC);


    }catch(PDOException $e){
        echo $e->getMessage();
    }

?>

<?php 
    foreach($data as $product);

?>