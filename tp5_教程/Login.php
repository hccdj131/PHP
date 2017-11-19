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
      // $this->success('验证成功，正在跳转', 'login/ok');
      //redirect(路由地址，请求变量，后缀，是否显示域名)
      $this->redirect('ok', ['siteName'=>'php中文网']);
    } else {
      // $this->error('验证失败，正在返回登录页面', 'login/login');
      $this->redirect('http://www.php.cn',302); //302是临时重定向，301是永久重定向
    }
  }
  public function ok($siteName)
  {
    return '欢迎来到'.$siteName.'学习ThinkPHP5开发技术';
  }
}
