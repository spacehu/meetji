<?php

namespace TigerDAL\Web;

use TigerDAL\BaseDAL;

/*
 * 用来返回生成首页需要的数据
 * 类
 * 访问数据库用
 * 继承数据库包
 */

class StatisticsDAL {

    function __construct() {
        
    }

    /** 插入日志 */
    public function insert($data) {
        $base = new BaseDAL();
        if (is_array($data)) {
            foreach ($data as $v) {
                $_data[] = " '" . $v . "' ";
            }
            $set = implode(',', $_data);
            $sql = "insert into " . $base->table_name('access_log') . " values (null," . $set . ");";
            return $base->query($sql);
        } else {
            return true;
        }
    }

}
