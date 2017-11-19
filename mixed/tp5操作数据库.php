<?php
namespace app\index\controller;

use think\Controller;
use think\Db;

class Index extends Controller
{
    public function index()
    {
        $db = Db::name('user');

        # update 返回影响的行数
        # 更新数据库

        $res = $db->where([
        		'id'    => 1
        	])->update([
        			'username'  => '177771258',
        			'email'     => '177771258@qq.com'
        	]);

        # setField
        # 只更新一个字段
        $res = $db->where([
        		'id'    => 3
        ])->setField('username', '1771258');

        # setInc
        $res = $db->where([
        		'id'    => 1
        	])->setInc('num');

        dump($res);
    }

    public function index()
    {
    	$db = Db::name('user');

    	$res = $db->where([
    			'id'    => 1
    		])->delete();

    	$res = $db->delete(2);

    	dump($res);
    }

    public function index()
    {
    	$db = Db::name('user');

    	# 备注信息
    	# EQ =
    	# NEQ <>
    	# LT <
    	# ELT <=
    	# GT >
    	# EGT >=
    	# BETWEEN BETWEEN * AND *
    	# NOTBETWEEN NOTBETWEEN * AND *
    	# IN IN (*,*)
    	# NOTIN NOT IN (*,*)

    	$res = $db->where("id", ">=", 1)->buildSql();

    	$res = $db
    		->where("id", "in", "1,2,3")
    		->whereOr("username", "eq", "17771258")
    		->whereOr("num", "lt", "10")
    		->where("email", "17771258@qq.com")
    		->buildSql();

    	$res = Db::table('imooc_user')
    		->where("id", ">", 10)
    		->field("username, id, group")
    		->order("id DESC")
    		->limit(3, 5)
    		->page(3, 5)  // limit((3-1)*5, 5)
    		->group("`group`")
    		->select();


    }
}

//使用模型查询，添加，更新，删除，聚合，操作

namespace app\index\controller;

use think\Controller;
use app\index\model\User;

class Index extends Controller
{
	public function index()
	{
		$res = User::get(function($query){
			$query->where("username", "eq", "imooc_10");
		});

		$res = User::where("id", 12)
			-> field("id, username")
			-> find();

		//查询多条数据
		$res = User::all(function($query){
			$query->where("id", "<", 5);
						->field("id, email");
		});

		$res = User::where("id", ">", "15")
				-> field("username, email")
				-> limit(3)
				-> order("id DESC")
				-> select();

		foreach($res as $val){
			dump($val)->toArray());
		}

		//增加数据
		public function index()
		{

			$res = User::create([
					'username' => 'imooc',
					'password' => md5('imooc'),
					'email'    => 'imooc@qq.com',
					'num'      => 100,
					'demo'     => 123
				], true);

			$userModel = new User;
			$userModel->username = '17771258';
			$userModel->email = '17771258@qq.com';
			$userModel->password = md5('17771258');
			$userModel->save();

			$userModel = new User;
			$res = $userModel
			->allowField(['username'])
			->save([
					'username' => 'imooc1',
					'password' => md5('imooc1')
					'demo'     => 123
				]);

			$userModel = new User;
			$res = $userModel->saveAll([
					['email'=> '17771258@qq.com'],
					['email'=> '17771253@qq.com'],
			]);

			foreach($res as $val){
				dump($val->id);
			}

			//更新数据
			public function index()
			{
				$res = User::update([
					'id'    => 1,
					'username' => '17771258'
				], ['id'=2]);
			}

			public function index()
			{
				$res = User::update([
						'username' => '17771258'
					], function($query){
						$query->where("id", "LT", 5);
					})
			}

			$userModel = User::get(1);
			$userModel->username = '123';
			$userModel->email = "123@qq.com";
			$res = $userModel->save();


			// 删除数据
			public function index()
			{
				$res = User::destroy(['id'=>2]);

				$res = User::destroy(function($query){
					$query->where("id", "<", 5);
				});

				$res = User::where("id", 5)
						-> delete();
			}

			dump($res->id);
			dump($res);

			// 模型聚合操作
			public function index()
			{
				$res = User::count();

				$res = User::where("id", ">", 5)
						-> count();

				$res = User::max('num');

				$res = User::where("id", "<", 5)
						-> max('num');

				$res = User::sum('num');

				$res = User::where("id", "<", 4)
						-> sum('num');

				$res = User::avg('num');


				// 模型获取器
			public function index()
			{
				$res = User::get(2);

				echo $res->sex;
			}

			}
		}
	}
}