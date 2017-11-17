<?php
class person{

}

function __autoload($className) {
  $fileName = "./class/{$className}.class.php";
  if(file_exists($fileName)) {
    include($fileName);
  }else{
    die("你使用的类{$className}.class.php不存在");
  }
}

// class_exists()函数 判断类是否存在
// 第一个参数：要判断类的名
// 第二个参数：（可选）如果设置为true则会自动去调用__autoload()方法进行类的自动加载
var_dump(class_exists("student", true));

// get_class_methods

class person {

  public function say() {

  }

  protected function run() {

  }

  private function eat() {

  }
}

$p = new person();
var_dump(get_class_methods($p));

 ?>
