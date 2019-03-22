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

class PointDAL {

    function __construct() {
        
    }

    /** 获取用户积分 */
    public function getUserPoint($userid) {
        $base = new BaseDAL();
        $sql = "select sum(`point`) as sum from " . $base->table_name("user_point") . " where `user_id`=" . $userid . " limit 1; ";
        return $base->getFetchRow($sql)['sum'];
    }

    /** 新增积分 */
    public function insert($data) {
        $base = new BaseDAL();
        if (is_array($data)) {
            foreach ($data as $v) {
                $_data[] = " '" . $v . "' ";
            }
            $set = implode(',', $_data);
            $sql = "insert into " . $base->table_name('user_point') . " values (null," . $set . ");";
            return $base->query($sql);
        } else {
            return true;
        }
    }

    /** 新增积分 */
    public function insertDaily($data) {
        $_date = explode(" ", $data['add_time']);
        $base = new BaseDAL();
        $sql = "select count(1) as num from " . $base->table_name('user_point') . " where user_id='" . $data['user_id'] . "' and type='share' and add_time like '" . $_date[0] . "%' limit 1;";
        //\mod\common::pr($sql);die;
        $count = $base->getFetchRow($sql)['num'];
        if ($count > 3) {
            return true;
        } else {
            return $this->insertTotal($data);
        }
    }

    /** 积分上限 */
    public function insertTotal($data) {
        $base = new BaseDAL();
        $sql = "select sum(point) as total from " . $base->table_name('user_point') . " where user_id='" . $data['user_id'] . "' limit 1;";
        $total = $base->getFetchRow($sql)['total'];
        if ($total + $data['point'] > \mod\init::$config['pointInfo']['personalMax']) {
            $data['point'] = \mod\init::$config['pointInfo']['personalMax'] - $total;
        }
        return $this->insert($data);
    }

    /** 积分下限 */
    public function insertZero($data) {
        $base = new BaseDAL();
        $sql = "select sum(point) as total from " . $base->table_name('user_point') . " where user_id='" . $data['user_id'] . "' limit 1;";
        $total = $base->getFetchRow($sql)['total'];
        if ($total + $data['point'] < 0) {
            return null;
        }
        $this->insert($data);
        return $base->last_insert_id();
    }

    /** 获取用户积分 */
    public function getAll($currentPage, $pagesize, $userid) {
        $base = new BaseDAL();
        $limit_start = ($currentPage - 1) * $pagesize;
        $limit_end = $pagesize;
        $sql = "select * from " . $base->table_name("user_point") . " where `user_id`=" . $userid . " limit " . $limit_start . "," . $limit_end . " ; ";
        return $base->getFetchAll($sql);
    }

    /** 获取用户积分count */
    public function getTotal($userid) {
        $base = new BaseDAL();
        $sql = "select count(1) as total from " . $base->table_name("user_point") . " where `user_id`=" . $userid . " limit 1 ;";
        return $base->getFetchRow($sql)['total'];
    }

}
