<?php
class person{

  public $name;
  public $age;
  public $sex;

  public function __construct($n, $a, $s) {
    $this -> name = $n;
    $this -> age = $a;
    $this -> sex = $s;
  }

  public function say() {
    echo "我的名字是：{$this -> name}, 我的年龄是：{$this ->age}, 我的性别是：{$this -> sex}";
  }
}

$person1 = new person("张三", 18, "男");

echo $person1 -> name;
echo "<br />";
echo $person1 -> age;
echo "<br />";
echo $person1 -> sex;
echo "<br />";
 ?>
