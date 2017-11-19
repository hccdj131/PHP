<?php
namespace app\index\controller;

class Index extends \think\Controller
{
  public function index()
  {
    return '<h2>欢迎来到PHP中文网学习</h2>';
  }
  public function hello($name)
  {
    if ($name == 'thinkphp')
    {
      $this->success('验证成功，正在跳转','ok');
    } else {
      $this->error('验证失败，正在返回登录页面','login');
    }
  }
  public function ok()
  {
    return '欢迎使用后台管理系统';
  }
  public function login()
  {
    return '登录页面';
  }
}
