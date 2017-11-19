<?php
// 类中的代码可分为二部分：
//1：自己写的私有代码
//2：从别处继承可导入的公共代码

//1.创建一个trait类Test1
trait Test1
{
  public $name = 'PHP中文网'; //trait类中可以有属性，不能有类常量
  public function hello1()
  {
    return 'Test1::hello1()';
  }
}
//2.创建一个trait类Test2
trait Test2
{
  use Test1; // 将Test1中的代码复制到了/导入到了Test2中
  public function hello2()
  {
    return 'Test2::hello2()'.$this->name;
  }
}
//创建类Deom1
class Demo1
{
  // use Test1, Test2;
  use Test2;
}
//测试
$obj = new Demo1;
echo $obj->hello1(); //访问trait类Test1中的hello1()
