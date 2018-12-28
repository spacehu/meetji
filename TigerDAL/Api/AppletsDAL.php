<?php

namespace TigerDAL\Api;

use TigerDAL\BaseDAL;

/*
 * 用来返回生成首页需要的数据
 * 类
 * 访问数据库用
 * 继承数据库包
 */

class AppletsDAL {

    function __construct() {
        
    }

    /** 获取照片 */
    public function GetPhoto($currentPage, $pagesize) {

        $base = new BaseDAL();
        $limit_start = ($currentPage - 1) * $pagesize;
        $limit_end = $pagesize;
        $sql = "select a.*,i.`original_src` as src,j.`original_src` as src_min "
                . "from " . $base->table_name("art_image") . " as a , " . $base->table_name("image") . " as i, " . $base->table_name("image") . " as j  "
                . "where a.`image_id`=i.`id` and a.`image_id_min`=j.`id` and a.`delete`=0 and i.`delete`=0  and j.`delete`=0 and a.`cat_id`=1 "
                . "order by a.`name` desc "
                . "limit " . $limit_start . "," . $limit_end . ";";
        //echo $sql;
        $data = $base->getFetchAll($sql);
        //\mod\common::pr($data);
        return ['data' => $data];
    }

    /** 获取照片数量 */
    public function GetPhotoTotal() {

        $base = new BaseDAL();
        $sql = "select count(1) as total  "
                . "from " . $base->table_name("art_image") . " as a , " . $base->table_name("image") . " as i, " . $base->table_name("image") . " as j  "
                . "where a.`image_id`=i.`id` and a.`image_id_min`=j.`id` and a.`delete`=0 and i.`delete`=0  and j.`delete`=0 and a.`cat_id`=1 ;";
        return $base->getFetchRow($sql)['total'];
    }


}
