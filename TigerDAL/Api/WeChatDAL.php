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

class WeChatDAL extends BaseDAL{

    function __construct() {
        parent::__construct();
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
        return $base->insert($data,"user_info_wechat");
    }

    public static function updateWeChatUserInfo($openid,$data) {
        $base = new BaseDAL();
        return $base->update($openid,$data,"user_info_wechat");
    }
}
