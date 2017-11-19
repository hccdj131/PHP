<?php

// 给请求对象注入的自定义属性与方法，与原请求对象中的属性与方法是同级的，
// 所以在整个应用的生命周期内都是有效的。
namespace app\index\controller

class Index extends \think\Controller
{
  public function index()
  {
    return '<h2>欢迎来到PHP中文网学习</h2>';
  }
  public function demo1($name)
  {
    return $this->request->siteName;
  }
  public function demo2()
  {
    return $this->request->getSiteName();
  }
}

demo.php
namespace app\index\controller

class Index extends \think\Controller
{
  public function hello()
  {
    if ($this->request->has('name','get')){
      return $this->request->param('name');
    } else {
      return '不存在';
    }
  }
}

common.php
<?php
use think\Request;
$request = Request::instance();
// 请求对象的属性注入
$request->siteName = 'PHP中文网';

//请求对象的方法注入
function getSiteName(Request $request) //第一个参数必须是Request类型的变量
{
  return '站点名称：'.$request->siteName;
}
//注册请求对象的方法，也叫钩子
Request::hook('getName','getSiteName');
