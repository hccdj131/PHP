<?php

namespace app\index\model;

use think\Model;

class User extends Model
{
  # 命名 imooc_user -> User.php
  #     imooc_user_info -> UserInfo.php UserInfo
}

use think\Controller;
use app\index\model\User;
use think\Loader;

class Index extends Controller
{
  public function index()
  {
    $res = User::get(2);
    dump($res->username);
    // $user = new User;
    // $res = $user::get(3);
    //
    // $user = Loader::model("User");

    // $user = model("User");
    // $res = $user::get(6);

    $res = User::where("id", 10)
        -> field("id, username")
        -> find();

    $res = User::get(function($query){
      $query->where("id", "eq", 1)
            ->field("username, email");
    });

    $res = User::all("1,2,3");
    $res = User::all([4,5,6]);
    $res = User::all(function($query){
      $query->where("id", "<", 5)
            ->field("id, email");
    });

    $res = User::where("id", ">", "15")
        ->filed("username, email")
        ->limit(3)
        ->order("id DESC")
        ->select();

    $res = User::column("email", "username");


    foreach($res as $val){
      dump($val->toArray());
    }

    $res = $res->toArray();
  }
}
