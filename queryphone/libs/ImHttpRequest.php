<?php
/**
 * @description HTTP请求模块
 * Created by PhpStorm.
 * User: cheon
 * Date: 2017/7/22
 * Time: 22:17
 */

namespace libs;


class ImHttpRequest
{
    public static function request($url, $params, $method = 'GET')
    {
        $response = null;
        if ($url) {
            $method = strtoupper($method);
            if ($method == 'POST') {

            } elseif ($method == 'PUT') {

            } elseif ($method == 'DELETE') {

            } else {
                if (is_array($params) and count($params)) {
                    if (strrpos($url, '?')) {
                        $url = $url . '&' . http_build_query($params);
                    } else {
                        $url = $url . '?' . http_build_query($params);
                    }
                }
            }
        }
    }
}