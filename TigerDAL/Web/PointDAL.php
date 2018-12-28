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
        return $base->getFetchRow($sql);
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
        $sql = "select count(1) as num from " . $base->table_name('user_point') . " where user_id='".$data['user_id']."' and type='login' and add_time like '" . $_date[0] . "%' limit 1;";
        $count = $base->getFetchRow($sql)['num'];
        if ($count > 0) {
            return true;
        } else {
            return $this->insert($data);
        }
    }

}
