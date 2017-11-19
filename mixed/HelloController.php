<?php
// yii

namespace app\controllers;

use yii\web\Controller;
use app\models\Test;
use app\models\Customer;
use app\models\Order;

class HelloController extends Controller{
    public function actionIndex() {
        // 查询数据
        // $id = '1 or 1=1';
        $sql = 'select * from test where id=:id';
        // select * from test

        $results = Test::findBySql($sql, array(':id'=>1))->all();

        $results = Test::find()->where(['like', 'title', 'title'])->all();

        //删除数据
        $results = Test::find()->where(['id'=>1])->all();
        $results[0]->delete();

        // 关联查询
        // 根据顾客查询它的订单的信息

        $customer = Customer::find()->where(['name'=>'zhangsan'])->one();
        $orders = $customer->hasMany(Order::className(), ['customer_id'=>'id'])->asArray()->all();
    }
}