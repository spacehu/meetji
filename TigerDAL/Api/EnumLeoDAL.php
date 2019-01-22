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

    /** 获取模糊地理位置的所有id */
    public static function GetRegionIdByName($name) {
        $base = new BaseDAL();
        $sql = "SELECT if(`rl`.id is not null,`rl`.id,0) as aid,if(rll.id is not null,rll.id,0) as bid "
                . "FROM  " . $base->table_name("region_leo") . " as rl  "
                . "left join " . $base->table_name("region_leo") . " as rll on rl.id=rll.pid  "
                . "WHERE   rl.`name` like '%" . $name . "%' or rll.`name` like '%" . $name . "%';";
        $obj = $base->getFetchAll($sql);
        $_arr = [0];
        if (!empty($obj)) {
            foreach ($obj as $k => $v) {
                $_arr[] = $v['aid'];
                $_arr[] = $v['bid'];
            }
        }
        $res = implode(",", array_unique($_arr));
        return $res;
    }

}
