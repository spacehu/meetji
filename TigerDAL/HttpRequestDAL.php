<?php

namespace TigerDAL;

use mod\init;
use TigerDAL\Api\LogDAL;

/*
 * 基本数据类包
 * 类
 * 访问数据库用
 * 继承数据库包
 */

class HttpRequestDAL {

    /**
    * 
    */
    public static function get($url,$headers=[]){
        return self::https_request($url,"get",null,$headers);
    }

    public static function post($url, $data = [], $headers = []){
        return self::https_request($url,"post",$data,$headers);
    }
    /**
     * @explain
     * 发送http请求，并返回数据
     * @param $url
     * @param array $data
     * @param array $headers
     * @return mixed
     */
     public static function https_request($url,$method="get", $data = [], $headers = [])
     {
         $curl = curl_init();
         curl_setopt($curl, CURLOPT_URL, $url);
         curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, FALSE);
         curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, FALSE);
         if ($method=="post") {
             curl_setopt($curl, CURLOPT_POST, 1);
             curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
         }
         curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
         curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
         $output = curl_exec($curl);
         curl_close($curl);
         return $output;
     }
}
