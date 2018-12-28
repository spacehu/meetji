<?php

namespace TigerDAL;

/*
 * 基本数据类包
 * 类
 * 访问数据库用
 * 继承数据库包
 */

class CatchDAL {

    /** 记录异常 */
    public static function markError($name, $code, $detail) {
        $base = new BaseDAL();
        $sql = "insert into " . $base->table_name('error_log') . " values(null,'" . $name . "','" . $code . "','" . $detail . "',now()) ;";
        return $base->query($sql);
    }

}
