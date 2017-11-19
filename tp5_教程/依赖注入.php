<?php

namespace app\index\controller;
use think\Controller;
use think\Request;

class Index extends Controller
{
  protected $request;
  public function __construct(Request $request)
  {
    $this->request = Request::instance();
  }
  public function index()
  {
    return '<h2>欢迎来到PHP中文网学习</h2>';
  }
  public function demo1(Request $request)
  {
    return '学习课程：'.$request->param('lesson');
  }
  public function demo2()
  {
    return '学习课程：'.Request::instance()->param('lesson');
  }
}
