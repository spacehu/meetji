<?php

namespace TigerDAL\Api;

use TigerDAL\BaseDAL;

class TokenDAL {

//下面是用户登陆时把token插入数据库的代码
    public static function saveToken($user_id) {
        $base = new BaseDAL();
        $token = self::settoken();
        $time_out = time() + 28800;
        $sql = "select * from " . $base->table_name("user_token") . " where user_id=" . $user_id . "; ";
        $_tokenData = $base->getFetchRow($sql);
        if (!empty($_tokenData)) {
            if (time() - $_tokenData['time_out'] < 0) { //再时间内的 刷新时间 返回token 
                $token = $_tokenData['token'];
                $_sql = "update " . $base->table_name("user_token") . " set `time_out`=" . $time_out . " where `user_id`=" . $user_id . ";";
            } else { //再时间外的 刷新时间和token 返回token
                $_sql = "update " . $base->table_name("user_token") . " set `token`='" . $token . "' , `time_out`=" . $time_out . " where `user_id`=" . $user_id . ";";
            }
        } else {
            $_sql = "insert into " . $base->table_name("user_token") . " (`token` , `time_out`,`user_id`) values('" . $token . "'," . $time_out . "," . $user_id . ");";
        }
        $base->query($_sql);
        return $token;
    }

//下面是用户登陆时把token从数据库中删除的代码
    public static function delToken() {
        $header = getallheaders();
        $token = $header['token'];
        $base = new BaseDAL();
        $_sql = "update " . $base->table_name("user_token") . " set `token`='' where `token`='" . $token . "';";
        $base->query($_sql);
    }

//下面是生成token方法代码
    public static function settoken() {
        $str = md5(uniqid(md5(microtime(true)), true));  //生成一个不会重复的字符串
        $str = sha1($str);  //加密
        return $str;
    }

//下面是每个接口都必须调用的token验证代码，验证具体实现是在（4）
    public static function checkToken() {
        $header = getallheaders();
//return $header;
        $token = (!empty($header['token'])) ? $header['token'] : (!empty($header['Token'])) ? $header['Token'] : "";
        return self::checktokens($token);
    }

//token验证方法，db::是数据库操作类，这里设置是token如果七天没被调用则需要重新登陆（也就是说用户7天没有操作APP则需要重新登陆），如果某个接口被调用，则会重新刷新过期时间
    public static function checktokens($token) {
        $base = new BaseDAL();
        $_sql = "select * from  " . $base->table_name("user_token") . " where `token`='" . $token . "';";
        $res = $base->getFetchRow($_sql);
        if (!empty($res)) {
            if (time() - $res['time_out'] > 0) {
                return ['code' => 90003, 'data' => $res, 'token' => $token];  //token长时间未使用而过期，需重新登陆
            }
            $new_time_out = time() + 28800; //604800是七天
            $_sql = "update " . $base->table_name("user_token") . " set `time_out`=" . $new_time_out . " where `token`='" . $res['token'] . "';";
            if ($base->query($_sql)) {
                return ['code' => 90001, 'data' => $res, 'token' => $token];  //token验证成功，time_out刷新成功，可以获取接口信息
            }
        }
        return ['code' => 90002, 'data' => $res, 'token' => $token];  //token错误验证失败
    }

}
