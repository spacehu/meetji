<?php

namespace TigerDAL\Api;

use TigerDAL\BaseDAL;
use TigerDAL\Api\LogDAL;

/*
 * 用来返回生成首页需要的数据
 * 类
 * 访问数据库用
 * 继承数据库包
 */

class WeChatDAL {

    function __construct() {
        
    }

    public static function getAccessToken() {
        $base = new BaseDAL();
        $sql = "select value from " . $base->table_name("system") . " where `name`='access_token' and `type`=1 and `edit_time` > '" . date("Y-m-d H:i:s", strtotime(" +1 hour ")) . "' ;";
        return $base->getFetchRow($sql);
    }

    public static function getOpenId($openId) {
        $base = new BaseDAL();
        $sql = "select * from " . $base->table_name("user_info_wechat") . " where `openid`='" . $openId . "' ;";
        return $base->getFetchRow($sql);
    }

    public static function addWeChatUserInfo($data) {
        $base = new BaseDAL();
        if (is_array($data)) {
            foreach ($data as $k => $v) {
                if (empty($v)) {
                    $_data[] = " null ";
                } else {
                    $_data[] = " '" . $v . "' ";
                }
            }
            $set = implode(',', $_data);
            $sql = "insert into " . $base->table_name('user_info_wechat') . " values (null," . $set . ");";
            LogDAL::saveLog("log", "INFO", $sql);
            $base->query($sql);
            return $base->last_insert_id();
        } else {
            return true;
        }
    }

}
