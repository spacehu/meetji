<?php

namespace TigerDAL\Cms;

use TigerDAL\BaseDAL;

class ArticleDAL {

    /** 获取用户信息列表 */
    public static function getAll($currentPage, $pagesize, $keywords) {
        $base = new BaseDAL();
        $limit_start = ($currentPage - 1) * $pagesize;
        $limit_end = $pagesize;
        $where = "";
        if (!empty($keywords)) {
            $where .= " and a.`name` like '%" . $keywords . "%' ";
        }
        $sql = "select a.*,b.`name` as bName from " . $base->table_name("article") . " as a left join ".$base->table_name("brand")." as b on a.brand_id=b.id and b.`delete`=0 where a.`delete`=0 " . $where . " order by a.edit_time desc limit " . $limit_start . "," . $limit_end . " ;";
        return $base->getFetchAll($sql);
    }

    /** 获取数量 */
    public static function getTotal($keywords) {
        $base = new BaseDAL();
        $where = "";
        if (!empty($keywords)) {
            $where .= " and name like '%" . $keywords . "%' ";
        }
        $sql = "select count(1) as total from " . $base->table_name("article") . " where `delete`=0 " . $where . " limit 1 ;";
        return $base->getFetchRow($sql)['total'];
    }

    /** 获取用户信息 */
    public static function getOne($id) {
        $base = new BaseDAL();
        $sql = "select * from " . $base->table_name("article") . " where `delete`=0 and id=" . $id . "  limit 1 ;";
        return $base->getFetchRow($sql);
    }

    /** 获取用户信息 */
    public static function getByName($name, $type) {
        $base = new BaseDAL();
        if (!empty($type)) {
            $where .= " and type = '" . $type . "' ";
        }
        $sql = "select * from " . $base->table_name("article") . " where `delete`=0 and name='" . $name . "' " . $where . "  limit 1 ;";
        return $base->getFetchRow($sql);
    }

    /** 新增用户信息 */
    public static function insert($data) {
        try {
            $base = new BaseDAL();
            if (is_array($data)) {
                foreach ($data as $v) {
                    if (is_numeric($v)) {
                        $_data[] = " " . $v . " ";
                    } else {
                        $_data[] = " '" . $v . "' ";
                    }
                }
                $set = implode(',', $_data);
                $sql = "insert into " . $base->table_name('article') . " values (null," . $set . ");";
                //echo $sql;die;
                $res = $base->query($sql);
                $id = $base->last_insert_id();
                if ($res) {
                    return $id;
                }
            } else {
                return true;
            }
        } catch (Exception $ex) {
            \TigerDAL\CatchDAL::markError(\config\code::$code[\config\code::WORKS_UPDATE], \config\code::WORKS_UPDATE, json_encode($sql));
        }
    }

    /** 更新用户信息 */
    public static function update($id, $data) {
        $base = new BaseDAL();
        if (is_array($data)) {
            foreach ($data as $k => $v) {
                if (is_numeric($v)) {
                    $_data[] = " `" . $k . "`=" . $v . " ";
                } else {
                    $_data[] = " `" . $k . "`='" . $v . "' ";
                }
            }
            $set = implode(',', $_data);
            $sql = "update " . $base->table_name('article') . " set " . $set . "  where id=" . $id . " ;";
            //echo $sql;die;
            return $base->query($sql);
        } else {
            return true;
        }
    }

    /** 删除用户信息 */
    public static function delete($id) {
        $base = new BaseDAL();
        $sql = "update " . $base->table_name('article') . " set `delete`=1  where id=" . $id . " ;";
        return $base->query($sql);
    }

    /** 导出 */
    public static function getAllByDate($currentPage, $pagesize, $keywords) {
        $base = new BaseDAL();
        $limit_start = ($currentPage - 1) * $pagesize;
        $limit_end = $pagesize;
        $where = "";
        if (!empty($keywords)) {
            $where .= " and a.`name` like '%" . $keywords . "%' ";
        }
        
        $sql = "select a.`name` as title,a.`overview`,a.`detail`,s.name as school,a.market_price,a.current_price,i.original_src "
                . "from " . $base->table_name("article") . " as a "
                . "left join " . $base->table_name("article_school") . " as `as` on a.id=`as`.article_id and `as`.`delete`=0 "
                . "left join " . $base->table_name("school") . " as s on `as`.school_id=s.id and s.`delete`=0 "
                . "left join " . $base->table_name("article_image") . " as `ai` on a.id=`ai`.article_id and ai.`delete`=0 "
                . "left join " . $base->table_name("image") . " as i on `ai`.image_id=i.id and i.`delete`=0 "
                . "where a.`delete`=0 " . $where . " "
                . "group by a.id "
                . "order by a.id asc "
                . "limit " . $limit_start . "," . $limit_end . " ;";
        return $base->getFetchAll($sql);
    }
}
