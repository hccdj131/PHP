<?php

namespace app\index\controller;

class Index extends \think\Controller
{
  public function index()
  {
    return '<h2>欢迎来到PHP中文网学习</h2>';
  }
  public function hello($name, $lesson)
  {
    return 'hello, 欢迎来到'.$name.'学习'.$lesson.'开发技术~~';
  }
  public function demo($id='', $name='', $age=18)
  {
    $request = \think\Request::instance();
    dump($request->get());
    dump($request->post());
    dump($request->param());
    dump($request->has('age'));
    dump($request->domain());
    dump($request->url());
    dump($request->url(true));
    dump($request->path());
    dump($request->pathinfo());
    dump($request->ip());
    dump($request->only('id'));

  }
}
