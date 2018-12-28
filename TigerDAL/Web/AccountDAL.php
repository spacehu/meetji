<?php

namespace TigerDAL\Web;

use TigerDAL\BaseDAL;
use TigerDAL\Cms\UserDAL;

/*
 * 用来返回生成首页需要的数据
 * 类
 * 访问数据库用
 * 继承数据库包
 */

class AccountDAL {

    function __construct() {
        
    }

    /** 检查是否可以注册 */
    public function checkPhone($phone, $code) {

        $base = new BaseDAL();
        $sql = "select * from " . $base->table_name("sms") . "  "
                . "where `phone`='" . $phone . "' and `code`='" . $code . "' and `add_time` >= '" . date("Y-m-d H:i:s", strtotime("-15 minute")) . "' "
                . "limit 1";
        //echo $sql;
        $data = $base->getFetchAll($sql);
        if (empty($data)) {
            return "errorSms";
        }
        $sql = "select * from " . $base->table_name("user") . "  "
                . "where `name`='" . $phone . "' and `delete`=0 "
                . "limit 1";
        $user = $base->getFetchAll($sql);
        if (!empty($user)) {
            return "errorUser";
        }
        return true;
    }

    /** 检查用户是否存在 */
    public function checkUser($phone, $password) {

        if(!is_numeric($phone)){
            return ['error' => '1', 'code' => "errorUser"];
        }
        $base = new BaseDAL();
        $sql = "select * from " . $base->table_name("user") . "  "
                . "where `name`='" . $phone . "' and `delete`=0 "
                . "limit 1";
        $user = $base->getFetchRow($sql);
        if (empty($user)) {
            return ['error' => '1', 'code' => "emptyUser"];
        }
        if ($user['password'] !== md5($password)) {
            return ['error' => '1', 'code' => "errorPassword"];
        }
        $sql = "select * from " . $base->table_name("user_info") . "  "
                . "where `user_id`=" . $user['id'] . " "
                . "limit 1";
        $user_info = $base->getFetchRow($sql);
        if (!empty($user_info)) {
            return ['error' => '0', 'code' => "", 'data' => $user_info];
        } else {
            return ['error' => '0', 'code' => "emptyUserInfo", 'data' => $user];
        }
    }

    /** 注册插入用户表 */
    public function insert($data) {
        $base = new BaseDAL();
        $user = new UserDAL();
        $user::insert($data);
        return $base->last_insert_id();
    }

    /** 获取用户 */
    public function getUser($userid) {
        $base = new BaseDAL();
        $sql = "select * from " . $base->table_name("user") . " where `id`=" . $userid . " limit 1; ";
        return $base->getFetchRow($sql);
    }

    /** 获取用户信息 */
    public function getUserInfo($userid) {
        $base = new BaseDAL();
        $sql = "select * from " . $base->table_name("user_info") . " where `user_id`=" . $userid . " limit 1; ";
        return $base->getFetchRow($sql);
    }

    /** 新增用户信息 */
    public function insertUserInfo($data) {
        $base = new BaseDAL();
        if (is_array($data)) {
            foreach ($data as $v) {
                $_data[] = " '" . $v . "' ";
            }
            $set = implode(',', $_data);
            $sql = "insert into " . $base->table_name('user_info') . " values (null," . $set . ");";
            return $base->query($sql);
        } else {
            return true;
        }
    }

    /** 更新用户信息 */
    public function updateUserInfo($id, $data) {
        $base = new BaseDAL();
        if (is_array($data)) {
            foreach ($data as $k => $v) {
                $_data[] = " `" . $k . "`='" . $v . "' ";
            }
            $set = implode(',', $_data);
            $sql = "update " . $base->table_name('user_info') . " set " . $set . "  where user_id=" . $id . " ;";
            return $base->query($sql);
        } else {
            return true;
        }
    }

    /** 获取用户积分 */
    public function getUserPoint($userid) {
        $base = new BaseDAL();
        $sql = "select sum(`point`) as sum from " . $base->table_name("user_point") . " where `user_id`=" . $userid . " limit 1; ";
        return $base->getFetchRow($sql);
    }

}
