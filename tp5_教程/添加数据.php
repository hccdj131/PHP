<?php

use think\Controller;
use app\index\model\User;

class Index extends Controller
{
  public function index()
  {
    $res = User::create([
      'username' => 'imooc',
      'password' => md5('imooc'),
      'email'    => 'imooc@qq.com',
      'num'      => 100
    ], true); // 加了true，能自动排除没有字段的操作

    $userModel = new User;
    $userModel->username = '17778';
    $userModel->email = '17778@qq.com';
    $userModel->password = md5(17778);
    $userModel->save();

    $userModel = new User;
    $res = $userModel->save([
      'username' => 'imooc1',
      'password' => md5('imooc1')
    ]);

    $userModel = new User;
    $res = $userModel->saveAll([
      ['email' => '1717@qq.com'],
      ['email' => '17178@qq.com'],
    ]);
  }
}
