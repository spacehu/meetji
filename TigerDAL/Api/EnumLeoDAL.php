<?php

namespace TigerDAL\Api;

use TigerDAL\BaseDAL;

/*
 * 用来返回生成首页需要的数据
 * 类
 * 访问数据库用
 * 继承数据库包
 */

class EnumLeoDAL {

    function __construct() {
        
    }

    /** 中国地区 */
    public static function GetRegion($id = 0) {

        $base = new BaseDAL();
        $sql = "select * from " . $base->table_name("region_leo") . " where pid='" . $id . "' order by id asc;";
        $data = $base->getFetchAll($sql);

        $sql = "select count(1) as num from " . $base->table_name("region_leo") . " where pid='" . $id . "' limit 1; ";
        $total = $base->getFetchRow($sql);

        return ['list' => $data, 'total' => $total['num']];
    }

    /** 获取该地区的完整层级 */
    public static function GetRegionFamily($id) {
        $obj[] = $id;
        $base = new BaseDAL();
        while ($id != 0) {
            $sql = "select * from " . $base->table_name("region_leo") . " where id='" . $id . "';";
            $id = $base->getFetchRow($sql)['pid'];
            $obj[] = $id;
        }
        $res = array_reverse($obj);
        unset($res[0]);
        return $res;
    }

}
