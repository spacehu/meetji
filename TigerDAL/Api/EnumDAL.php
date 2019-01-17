<?php

namespace TigerDAL\Api;

use TigerDAL\BaseDAL;

/*
 * 用来返回生成首页需要的数据
 * 类
 * 访问数据库用
 * 继承数据库包
 */

class EnumDAL {

    function __construct() {
        
    }

    /** 获取轮播图片 */
    public static function GetRegion($id = 0) {

        $base = new BaseDAL();
        $sql = "select * from " . $base->table_name("region_china") . " where pid='" . $id . "' order by id asc;";
        $data = $base->getFetchAll($sql);

        $sql = "select count(1) as num from " . $base->table_name("region_china") . " where pid='" . $id . "' limit 1; ";
        $total = $base->getFetchRow($sql);

        return ['list' => $data, 'total' => $total['num']];
    }

    /** 获取轮播图片 */
    public static function GetRegionWithOutCountry($id = 0) {

        $res = self::GetRegion($id);
        if ($id == 0) {
            unset($res['list'][0]);
            $res['list'] = array_values($res['list']);
            $res['total'] = $res['total'] - 1;
        }

        return $res;
    }

    /** 获取该地区的完整层级 */
    public static function GetRegionFamily($id) {
        $obj[] = $id;
        $base = new BaseDAL();
        while ($id != 0) {
            $sql = "select * from " . $base->table_name("region_china") . " where id='" . $id . "';";
            $id = $base->getFetchRow($sql)['pid'];
            $obj[] = $id;
        }
        $res = array_reverse($obj);
        unset($res[0]);
        return $res;
    }

}
