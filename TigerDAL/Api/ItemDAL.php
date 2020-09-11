<?php

namespace TigerDAL\Api;

use TigerDAL\BaseDAL;

/*
 * 用来返回生成首页需要的数据
 * 类
 * 访问数据库用
 * 继承数据库包
 */

class ItemDAL {

    function __construct() {
        
    }

    /** 获取单个 */
    public function getOne($id) {

        $base = new BaseDAL();
        $sql = "select a.* "
                . " from " . $base->table_name("item") . " as a "
                . " where a.`delete`=0 and a.`id`='" . $id . "' ;";
        //\mod\common::pr($sql);die;
        $data = $base->getFetchRow($sql);
        $_sql = "select i.* from " . $base->table_name("item_image") . " as ai ," . $base->table_name("image") . " as i "
                . "where ai.image_id=i.id and ai.item_id='" . $id . "' order by ai.add_time asc limit 1,99;";
        $_data = $base->getFetchAll($_sql);
        $data['image'] = $_data;
        return ['data' => $data];
    }

}
