<?php

namespace TigerDAL\Cms;

use TigerDAL\BaseDAL;

class UserWechatDAL {

    /** 获取用户信息列表 */
    public static function getAll($currentPage, $pagesize, $keywords) {
        $base = new BaseDAL();
        $limit_start = ($currentPage - 1) * $pagesize;
        $limit_end = $pagesize;
        $where = "";
        if (!empty($keywords)) {
            $where .= " where name like '%" . $keywords . "%' ";
        }
        $sql = "select * from " . $base->table_name("user_info_wechat") . " " . $where . " order by edit_time desc limit " . $limit_start . "," . $limit_end . " ;";
        return $base->getFetchAll($sql);
    }

    /** 获取数量 */
    public static function getTotal($keywords) {
        $base = new BaseDAL();
        $where = "";
        if (!empty($keywords)) {
            $where .= " where name like '%" . $keywords . "%' ";
        }
        $sql = "select count(1) as total from " . $base->table_name("user_info_wechat") . " " . $where . " limit 1 ;";
        return $base->getFetchRow($sql)['total'];
    }

    /** 获取用户信息 */
    public static function getOne($id) {
        $base = new BaseDAL();
        $sql = "select * from " . $base->table_name("user_info_wechat") . " where id=" . $id . "  limit 1 ;";
        return $base->getFetchRow($sql);
    }

    /** 获取用户信息 */
    public static function getByOpenid($openid) {
        $base = new BaseDAL();
        $sql = "select * from " . $base->table_name("user_info_wechat") . " where openid='" . $openid . "'  limit 1 ;";
        return $base->getFetchRow($sql);
    }

    /** 新增用户信息 */
    public static function insert($data) {
        $base = new BaseDAL();
        if (is_array($data)) {
            foreach ($data as $v) {
                $_data[] = " '" . $v . "' ";
            }
            $set = implode(',', $_data);
            $sql = "insert into " . $base->table_name('user_info_wechat') . " values (null," . $set . ");";
            return $base->query($sql);
        } else {
            return true;
        }
    }

    /** 更新用户信息 */
    public static function update($id, $data) {
        $base = new BaseDAL();
        if (is_array($data)) {
            foreach ($data as $k => $v) {
                $_data[] = " `" . $k . "`='" . $v . "' ";
            }
            $set = implode(',', $_data);
            $sql = "update " . $base->table_name('user_info_wechat') . " set " . $set . "  where id=" . $id . " ;";
            return $base->query($sql);
        } else {
            return true;
        }
    }

}
