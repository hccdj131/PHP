<?php

单独赋值：$this->assign('domain','php.cn');

批量赋值：$this->assign([
  'domain' => 'www.php.cn',
  'siteName' => 'php中文网'
]);

return $this->fetch('index',['name'=>'Peter','age'=>28]);

return $this->display('姓名:{$name},年龄：{$age}',[
    'name'=>'Peter',
    'age'=>28
]);

return view('index',[
  'domain' => 'www.php.cn',
  'siteName' => 'php中文网'
]);
