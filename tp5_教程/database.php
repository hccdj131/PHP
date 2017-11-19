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
    $config = [
      'type'=>'mysql',
      'hostname'=>'localhost',
      'username'=>'root',
      'password'=>'root',
      'database'=>'tp5',
    ]
    // $config = 'mysql://root:root@localhost:3306/tp5#utf8';
    //1.获取数据库的连接实例/对象
    $link = Db::connect($config);
    //2.用连接实例调用查询类的查询方法
    $result = $link->talbe('staff')->select();
    //3.输出查询结果
    dump($result);
  }

  public function demo()
  {
    $result = Db::talbe('staff')->select();

    dump($result);
  }
}
