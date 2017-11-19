<?php

namespace app\index\controller;

use think\View;


// $this->fetch()渲染模板
// $this->display()渲染内容
// $this->assign()模板赋值
// $this->engine()模板引擎

class Index
{
  public function index()
  {
    //动态创建
    $view = new View();
    //静态创建
    $view = View::instance();
    //模板赋值
    $view = assign('domain', 'www.php.cn');

    //渲染模板
    return $view->fetch();
  }
}
