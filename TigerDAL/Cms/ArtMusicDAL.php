<?php

namespace TigerDAL\Cms;

use TigerDAL\BaseDAL;

class ArtMusicDAL {

    /** 获取用户信息列表 */
    public static function getAll($currentPage, $pagesize, $keywords) {
        $base = new BaseDAL();
        $limit_start = ($currentPage - 1) * $pagesize;
        $limit_end = $pagesize;
        $where = "";
        if (!empty($keywords)) {
            $where .= " and name like '%" . $keywords . "%' ";
        }
        $sql = "select * from " . $base->table_name("art_music") . " where `delete`=0 " . $where . " order by edit_time desc limit " . $limit_start . "," . $limit_end . " ;";
        return $base->getFetchAll($sql);
    }

    /** 获取数量 */
    public static function getTotal($keywords) {
        $base = new BaseDAL();
        $where = "";
        if (!empty($keywords)) {
            $where .= " and name like '%" . $keywords . "%' ";
        }
        $sql = "select count(1) as total from " . $base->table_name("art_music") . " where `delete`=0 " . $where . " limit 1 ;";
        return $base->getFetchRow($sql)['total'];
    }

    /** 获取用户信息 */
    public static function getOne($id) {
        $base = new BaseDAL();
        $sql = "select * from " . $base->table_name("art_music") . " where `delete`=0 and id=" . $id . "  limit 1 ;";
        return $base->getFetchRow($sql);
    }

    /** 获取用户信息 */
    public static function getByName($name) {
        $base = new BaseDAL();
        $sql = "select * from " . $base->table_name("art_music") . " where `delete`=0 and name='" . $name . "' limit 1 ;";
        return $base->getFetchRow($sql);
    }

    /** 新增用户信息 */
    public static function insert($data) {
        $base = new BaseDAL();
        if (is_array($data)) {
            foreach ($data as $v) {
                $_data[] = " '" . $v . "' ";
            }
            $set = implode(',', $_data);
            $sql = "insert into " . $base->table_name('art_music') . " values (null," . $set . ");";
            $base->query($sql);
            return $base->last_insert_id();
        } else {
            return true;
        }
    }

    /** 更新用户信息 */
    public static function update($id, $data) {
        $base = new BaseDAL();
        if (is_array($data)) {
            foreach ($data as $k => $v) {
                $_data[] = " `" . $k . "`='" . $v . "' ";
            }
            $set = implode(',', $_data);
            $sql = "update " . $base->table_name('art_music') . " set " . $set . "  where id=" . $id . " ;";
            return $base->query($sql);
        } else {
            return true;
        }
    }

    /** 删除用户信息 */
    public static function delete($id) {
        $base = new BaseDAL();
        $sql = "update " . $base->table_name('art_music') . " set `delete`=1  where id=" . $id . " ;";
        return $base->query($sql);
    }

    /*     * *********************************************************************************************************** */

    public static function getMusics($id) {
        $base = new BaseDAL();
        $sql = "select * from " . $base->table_name('album_music') . " as r , " . $base->table_name('media') . " as m where r.media_id=m.id and r.art_music_id=" . $id . " ;";
        return $base->getFetchAll($sql);
    }

    public static function updateAlbum($id, $medias) {
        $base = new BaseDAL();
        $sql = "delete from " . $base->table_name('album_music') . " where art_music_id=" . $id . " ;";
        //\mod\common::pr($sql);
        $base->query($sql);
        foreach ($medias as $k => $v) {
            $sql = "insert into " . $base->table_name('album_music') . " values (" . $id . "," . $v . ");";
            //\mod\common::pr($sql);
            $base->query($sql);
        }
    }

}
