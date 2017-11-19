<?php
namespace app\index\controller;
use think\Db;

class Index
{
  public function index()
  {
    return '<h2>欢迎来到PHP中文网学习</h2>';
  }
  public function demo()
  {
    //1.查询操作：工资大于4000元的员工信息,用命名占位符进行参数绑定
    $sql = "select name,salary,dept from staff where salary > :salary";
    $result = Db::query($sql,['salary'=>4000]);
    dump($result);

    //2.更新操作
    $sql = "update staff set salary = salary+1000 where id = :id";
    $result = Db::execute($sql, ['id'=>1004]);
    dump($result);

    //3.插入操作：默认添加到表的尾部的
    $sql = "insert into staff (name,sex,age) values (:name,:sex,:age)";
    $result = Db::execute($sql,['name'=>'朱老师','sex'=>1,'age'=>30]);

    //4.删除操作
    $sql = "delete from staff where id=:id";
    $result = Db::execute($sql,['id'=>1010]);

  }
}
