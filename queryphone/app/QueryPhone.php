<?php
/**
 * Created by PhpStorm.
 * User: cheon
 * Date: 2017/7/22
 * Time: 21:55
 */
namespace app;

class QueryPhone {
    public static function query($phone) {
        var_dump(self::verifyPhone($phone));
    }

    /*
     * 校验手机号码合法性
     * @param null $phone
     * @return bool
     */
    public static function verifyPhone($phone = null)
    {
        $ret = false;
        if ($phone) {
            if (preg_match('/^1[34578]{1}\d{9}/', $phone)) {
                $ret = true;
            }
        }
        return $ret;
    }
}