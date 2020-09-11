<?php

namespace TigerDAL\Cms;

use TigerDAL\BaseDAL;

class ItemImageDAL {

    /** 获取用户信息列表 */
    public static function getAll($aid) {
        $base = new BaseDAL();
        $sql = "select * from " . $base->table_name("item_image") . " where `item_id`='" . $aid . "' and `delete`=0  order by edit_time desc;";
        return $base->getFetchAll($sql);
    }

    /** 新增用户信息 */
    public static function insert($data) {
        $base = new BaseDAL();
        return $base->insert($data,'item_image');
    }

    /** 更新用户信息 */
    public static function update($id, $data) {
        $base = new BaseDAL();
        return $base->update($id,$data,'item_image');
    }

    /** 删除用户信息 */
    public static function delete($id) {
        $base = new BaseDAL();
        $sql = "update " . $base->table_name('item_image') . " set `delete`=1  where id=" . $id . " ;";
        return $base->query($sql);
    }

    /** 保存最新值 其他直接删除 */
    public static function save($_data, $aid, $_sourseData) {
        if (empty($_data)) {
            return false;
        }
        $base = new BaseDAL();
        $sql = "delete from " . $base->table_name('item_image') . " where `item_id`='" . $aid . "';";
        $base->query($sql);

        foreach ($_data as $v) {
            if ($v != 0) {
                $os = $_sourseData;
                array_unshift($os, $v, $aid);
                //print_r($os);
                self::insert($os);
            }
        }
        return true;
    }

}
