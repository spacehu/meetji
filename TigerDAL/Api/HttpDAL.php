<?php

namespace TigerDAL\Api;

/*
 * 用来返回生成首页需要的数据
 * 类
 * 访问数据库用
 * 继承数据库包
 */

class HttpDAL {

    function __construct() {
        
    }

    public static function Get($url) {
        $result = self::Http($url, "GET");
        return $result;
    }

    public static function Post($url, $data) {
        $result = self::Http($url, "POST", $data);
        return $result;
    }

    private static function Http($url, $hk, $data = Array()) {
        //	set_time_limit(0);
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        if ($hk == "POST") {
            curl_setopt($ch, CURLOPT_POST, 1);
        }
        if ($hk == "GET") {
            curl_setopt($ch, CURLOPT_HTTPGET, true);
        }
        curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        $result = curl_exec($ch);
        curl_close($ch);
        return $result;
    }

}
