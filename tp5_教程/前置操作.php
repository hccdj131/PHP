<?php

class Index extends \think\Controller
{
  protected $beforeActionList = [ // 前置方法列表，继承自Controller
    'before1'=>'', // 为空，表示before1是当前类中的全部操作的前置操作
    'before2'=>['only'=>'demo2'], //before2仅对demo2操作有效
    'before3'=>['except'=>'demo1, demo2'], //before3仅对除了demo1,demo2之外的操作有效
  ]; 
  protected $siteName; // 自定义属性
  protected function before1()
  {
    $this->siteName = $this->request->param('name');
  }
  protected function before2()
  {
    $this->siteName = '坚决抵制萨德';
  }
  public function demo1()
  {
    return $this->siteName;
  }
  public function demo2()
  {
      return $this->siteName;
  }
}
