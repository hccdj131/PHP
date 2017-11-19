<?php

namespace app;

use think\Db;

class Index
{
  public function index()
  {
    dump(
      Db::table('staff')
      ->filed(['name','salary'])
      ->where('id',1006)
      ->find()
    );
  }
}
